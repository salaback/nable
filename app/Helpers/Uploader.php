<?php


namespace app\Helpers;

use Maatwebsite\Excel\Facades\Excel;
use nable\Respondent;
use nable\RespondentAddress;
use nable\RespondentEmail;
use nable\RespondentPhone;

class Uploader
{
    static function cleanPhoneNumber($number)
    {
        $num =  preg_replace('[\D]', '', $number);

        if($num[0] != 1)
        { $num = '1' . $num; }

        return $num;
    }

    static function csvToRespondents($file, $project_id)
    {
        $respondents = Excel::load($file, function($reader){$reader->toArray();});
        $respondents = $respondents->parsed;
        $count = null;
        foreach($respondents as $respondent)
        {
            $count++;

            $new = Respondent::create([
                'first_name' => $respondent->first_name,
                'last_name' => $respondent->last_name,
                'gender' => $respondent->gender,
                'dob' => $respondent->dob,
                'project_id' => $project_id
            ]);

            if(isset($respondent->email) && $respondent->email != null)
            {
                $email = RespondentEmail::firstOrCreate(['project_id' => $project_id, 'address' => $respondent->email]);
                $email->type = $respondent->type;
                $email->save();
                $new->emails()->save($email);
            }

            if(isset($respondent->phone) && $respondent->phone != null)
            {
                $ph_num = Uploader::cleanPhoneNumber($respondent->phone);
                $phone = RespondentPhone::firstOrCreate(['project_id' => $project_id, 'number' => $ph_num]);
                $phone->type = $respondent->phone_type;
                $phone->save();
                $new->phones()->save($phone);
            }

            if(isset($respondent->email) && $respondent->email != null)
            {
                $address = RespondentAddress::firstOrCreate([
                    'project_id' => $project_id,
                    'street_number' => $respondent->street_number,
                    'street_name'   => $respondent->street_name,
                    'apt'   => $respondent->apt,
                    'city' => $respondent->city,
                    'state' => $respondent->state,
                    'zip' => $respondent->zip,
                    'type' => $respondent->address_type
                ]);
                $new->addresses()->save($address);
            }
        }

        return $count;
    }
}