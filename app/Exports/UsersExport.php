<?php

namespace App\Exports;

use App\Model\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
	/**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Mã nhân viên',
            'Tên nhân viên',
            'Email',
            'Team',
            'ngày đăng ký',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$users = User::OrderBy('id', 'DESC')->where('id_teams', '>', 1)->get();
        return $users;
    }

    

}
