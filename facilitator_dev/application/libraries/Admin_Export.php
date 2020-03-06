<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Export {
    
    function to_excel($array, $filename) {

        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');
        header("Pragma: no-cache");
        header("Expires: 0");

        $header = '';

        // Filter all keys, they'll be table headers
        foreach($array->result_array() as $row) {

            foreach($row as $key => $val) {

                if($key != 'id') {

                    $header .= $key."\t";
                }
            }
            break;
        }
        
        $line = '';
        foreach($array->result_array() as $row) {

            foreach($row as $val)
                $line .= $val."\t";

            $line .="\n";   
        }

        print "$header\n$line";  
    }

    function speaker_proposal_to_excel($array, $filename) {

        header('Content-type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');
        header("Pragma: no-cache");
        header("Expires: 0");
        
        $line = '';

        foreach($array as $row) {

            $line .= "<table>";
            $line .= "<tr>";
            $line .= "<th align=center>id</th>";
            $line .= "<th align=center>title</th>";
            $line .= "<th align=center>summary</th>";
            $line .= "<th align=center>audience_mix</th>";
            $line .= "<th align=center>key_takeaway</th>";
            $line .= "<th align=center>category</th>";
            $line .= "<th align=center>skill_level</th>";
            $line .= "<th align=center>city</th>";
            $line .= "<th align=center>created</th>";
            $line .= "<th align=center>modified</th>";

            $line .= "</tr>";

            $line .= "<tr>";

            $line .= "<td align=center>".$row->id."</td>";
            $line .= "<td align=center>".$row->title."</td>";
            $line .= "<td align=center>".$row->summary."</td>";
            $line .= "<td align=center>".$row->audience_mix."</td>";
            $line .= "<td align=center>".$row->key_takeaway."</td>";
            $line .= "<td align=center>".$row->category."</td>";
            $line .= "<td align=center>".$row->skill_level."</td>";
            $line .= "<td align=center>".$row->city."</td>";
            $line .= "<td align=center>".$row->created."</td>";
            $line .= "<td align=center>".$row->modified."</td>";

            $line .="</tr>";

            $line .="</table>";

            if(isset($row->main_speaker)) {

                $line .= "<table>";

                $line .= "<tr>";
                $line .= "Main Speaker Details";
                $line .= "</tr>";

                $line .= "<tr>";

                $line .= "<th align=center>id</th>";
                $line .= "<th align=center>name</th>";
                $line .= "<th align=center>job_title</th>";
                $line .= "<th align=center>organization</th>";
                $line .= "<th align=center>email</th>";
                $line .= "<th align=center>phone</th>";
                $line .= "<th align=center>biography</th>";
                $line .= "<th align=center>linked_in</th>";
                $line .= "<th align=center>twitter</th>";
                $line .= "<th align=center>website</th>";
                $line .= "<th align=center>blog</th>";

                $line .= "</tr>";

                $line .= "<tr>";

                $line .= "<td align=center>1</td>";
                $line .= "<td align=center>".$row->main_speaker->name."</td>";
                $line .= "<td align=center>".$row->main_speaker->job_title."</td>";
                $line .= "<td align=center>".$row->main_speaker->organization."</td>";
                $line .= "<td align=center>".$row->main_speaker->email."</td>";
                $line .= "<td align=center>".$row->main_speaker->phone."</td>";
                $line .= "<td align=center>".$row->main_speaker->biography."</td>";
                $line .= "<td align=center>".$row->main_speaker->linked_in."</td>";
                $line .= "<td align=center>".$row->main_speaker->twitter."</td>";
                $line .= "<td align=center>".$row->main_speaker->website."</td>";
                $line .= "<td align=center>".$row->main_speaker->blog."</td>";

                $line .= "</tr>";

                $line .= "</table>";
            }

            if(isset($row->co_speakers)) {

                $line .= "<table>";

                $line .= "<tr>";
                $line .= "Co Speaker Details";
                $line .= "</tr>";

                $line .= "<tr>";

                $line .= "<th align=center>id</th>";
                $line .= "<th align=center>name</th>";
                $line .= "<th align=center>job_title</th>";
                $line .= "<th align=center>organization</th>";
                $line .= "<th align=center>email</th>";
                $line .= "<th align=center>phone</th>";
                $line .= "<th align=center>biography</th>";
                $line .= "<th align=center>linked_in</th>";
                $line .= "<th align=center>twitter</th>";
                $line .= "<th align=center>website</th>";
                $line .= "<th align=center>blog</th>";

                $line .= "</tr>";

                $i = 1;
                foreach ($row->co_speakers as $key => $value) {

                    $line .= "<tr>";

                    $line .= "<td align=center>".$i++."</td>";
                    $line .= "<td align=center>".$value->name."</td>";
                    $line .= "<td align=center>".$value->job_title."</td>";
                    $line .= "<td align=center>".$value->organization."</td>";
                    $line .= "<td align=center>".$value->email."</td>";
                    $line .= "<td align=center>".$value->phone."</td>";
                    $line .= "<td align=center>".$value->biography."</td>";
                    $line .= "<td align=center>".$value->linked_in."</td>";
                    $line .= "<td align=center>".$value->twitter."</td>";
                    $line .= "<td align=center>".$value->website."</td>";
                    $line .= "<td align=center>".$value->blog."</td>";

                    $line .= "</tr>";
                }

                $line .= "</table>";
            }   

            $line .= "<table></table>";
        }

        print_r($line);  
    }

}