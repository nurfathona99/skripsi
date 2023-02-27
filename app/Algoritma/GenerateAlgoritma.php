<?php namespace app\Algoritma;
use App\Models\HariModel;
use App\Models\Jadwal;
use App\Models\JamModel;
use App\Models\KelasModel;
use App\Models\RuanganModel;
use App\Models\Mengajar;
use Illuminate\Support\Facades\DB;

class GenerateAlgoritma
{
    public function randKromosom($kromosom, $count_teachs, $input_year, $input_semester)
    {
        Jadwal::truncate();

        for ($i = 0; $i < $kromosom; $i++)
        {
            $values = [];
            for ($j = 0; $j < $count_teachs; $j++)
            {
                $teach = Mengajar::whereHas('matakuliah', function ($query) use ($input_semester)
                {
                    $query->where('matakuliah.semester', $input_semester);
                });

                $day   = HariModel::inRandomOrder()->first();
                $teach = $teach->where('year', $input_year)->inRandomOrder()->first();
                $room  = RuanganModel::where('jenis', $teach->course->jenis)->inRandomOrder()->first();
                $time  = JamModel::where('sks', $teach->course->sks)->inRandomOrder()->first();

                $params = [
                    'id_mengajar' => $teach->id,
                    'id_hari'   => $day->id,
                    'id_waktu'  => $time->id,
                    'id_ruangan'  => $room->id,
                    'jenis'      => $i + 1,
                ];

                $schedule = Jadwal::create($params);
            }
            $data[] = $values;
        }

        return $data;
    }

    public function checkPinalty()
    {
        $schedules = Jadwal::select(DB::raw('id_waktu, id_hari, id_ruangan, jenis, count(*) as `jumlah`'))
            ->groupBy('id_waktu')
            ->groupBy('id_hari')
            ->groupBy('id_ruangan')
            ->groupBy('jenis')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Jadwal::select(DB::raw('id_waktu, id_hari, id_ruangan, jenis, count(*) as `jumlah`'))
            ->groupBy('id_waktu')
            ->groupBy('id_hari')
            ->groupBy('id_ruangan')
            ->groupBy('Jenis')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Jadwal::select(DB::raw('id_waktu, id_hari, id_ruangan, jenis, count(*) as `jumlah`'))
            ->groupBy('id_waktu')
            ->groupBy('id_hari')
            ->groupBy('id_ruangan')
            ->groupBy('jenis')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Jadwal::join('mengajar', 'id_mengajar', '=', 'schedules.id_mengajar')
            ->join('dosen', 'id_dosen', '=', 'mengajar.id_dosen')
            ->select(DB::raw('id_dosen, id_hari, id_waktu, jenis, count(*) as `jumlah`'))
            ->groupBy('id_dosen')
            ->groupBy('id_hari')
            ->groupBy('id_jam')
            ->groupBy('jenis')
            ->having('jumlah', '>', 1)
            ->get();

        $result_schedules = $this->increaseProccess($schedules);

        $schedules = Jadwal::where('id_hari', Jadwal::FRIDAY)->whereIn('id_waktu', [12, 19, 24])->get();

        if (!empty($schedules))
        {
            foreach ($schedules as $key => $schedule)
            {
                $schedule->value         = $schedule->value + 1;
                $schedule->value_process = $schedule->value_process . "+ 1 ";
                $schedule->save();
            }
        }

        $kelas = KelasModel::get();

        if (!empty($kelas))
        {
            foreach ($kelas as $kelas => $kelas)
            {
                $schedules = Jadwal::whereHas('mengajar', function ($query) use ($kelas)
                {
                    $query = $query->whereHas('dosen', function ($q) use ($kelas)
                    {
                        $q->where('id_dosen', $kelas->id_dosen);
                    });
                });


                if (!empty($schedules))
                {
                    foreach ($schedules as $key => $schedule)
                    {
                        $schedule->value         = $schedule->value + 1;
                        $schedule->value_process = $schedule->value_process . "+ 1 ";
                        $schedule->save();
                    }
                }

            }
        }

        $schedules = Jadwal::get();

        foreach ($schedules as $key => $schedule)
        {
            $schedule->value = 1 / (1 + $schedule->value);
            $schedule->save();
        }

        return $schedules;
    }

    public function increaseProccess($schedules = '')
    {
        if (!empty($schedules))
        {
            foreach ($schedules as $key => $schedule)
            {
                if ($schedule->jumlah > 1)
                {
                    $schedule_wheres = Jadwal::where('jenis', $schedule->type)->get();
                    foreach ($schedule_wheres as $key => $schedule_where)
                    {
                        $schedule_where->value         = $schedule_where->value + ($schedule->jumlah - 1);
                        $schedule_where->value_process = $schedule_where->value_process . " + " . ($schedule->jumlah - 1);
                        $schedule_where->save();
                    }
                }
            }
        }
        return $schedules;
    }

}
