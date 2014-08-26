<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: August/27/14
 * Time: 1:35 AM
 */

namespace lib\Classes;


class ExportData {

    public static function CSV($contacts){
//        $list = array (
//            array('aaa', 'bbb', 'ccc', 'dddd'),
//            array('123', '456', '789'),
//            array('"aaa"', '"bbb"')
//        );


        $filePath = public_path().'/temp/contacts.csv';

        $fp = fopen($filePath, 'w');

        foreach ($contacts as $contact) {
            fputcsv($fp, $contact);
        }

        fclose($fp);


        //TODO: Instead of redirecting to the /export/csv page, go to the /downloads page and call for download thru javascript

        $file = public_path().'/temp/contacts.csv';

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=contacts.csv");

        readfile ($file);
    }

} 