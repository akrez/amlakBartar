<?php

namespace Anisra\AmlakBartar;

use Rakit\Validation\Validator;
use ConnectDatabase\DataBase;



class MelkController extends HomeController

{
    public function melk()
    {

        $error = 0;
        $errors = 0;
        $message = 0;
        $Address = '';
        $Construction = '';
        $Meterage = '';
        $Direction = '';
        $Floors = '';
        $units = '';
        $Floor = '';
        $owner = '';
        $phone = '';

        $this->render('users/melk', compact('errors', 'error', 'message', 'Address', 'Construction', 'Meterage', 'Direction', 'Floors', 'units', 'Floor', 'owner', 'phone'));
    }

    public function sort()
    {

        $error = 0;
        $errors = 0;
        $message = 0;
        $owner = trim($_POST['owner']);
        $phone = trim($_POST['phone']);
        $Address = trim($_POST['Address']);
        $Construction = trim($_POST['Construction']);
        $Meterage = trim($_POST['Meterage']);
        $Direction = trim($_POST['Direction']);
        $Floors = trim($_POST['Floors']);
        $units = trim($_POST['units']);
        $Floor = trim($_POST['Floor']);

        $validator = new Validator;
        $validation = $validator->validate($_POST + $_FILES, []);
        if ($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->firstOfAll();
            $this->render('users/melk', compact('errors', 'error', 'message', 'Address', 'Construction', 'Meterage', 'Direction', 'Floors', 'units', 'Floor', 'owner', 'phone'));
            exit;
        }

        if (
            !empty($_POST['owner'])
            && !empty($_POST['phone'])
            && !empty($_POST['Address'])
            && !empty($_POST['Construction'])
            && !empty($_POST['Meterage'])
            && !empty($_POST['Direction'])
            && !empty($_POST['Floors'])
            && !empty($_POST['units'])
            && !empty($_POST['Floor'])
        ) {

            $owner = trim($_POST['owner']);
            $phone = trim($_POST['phone']);
            $Address = trim($_POST['Address']);
            $Construction = trim($_POST['Construction']);
            $Meterage = trim($_POST['Meterage']);
            $Direction = trim($_POST['Direction']);
            $Floors = trim($_POST['Floors']);
            $units = trim($_POST['units']);
            $Floor = trim($_POST['Floor']);
            if (!empty($_POST['Elevator'])) {
                $Elevator = trim($_POST['Elevator']);
            } else {
                $Elevator = "";
            }
            if (!empty($_POST['Parking'])) {
                $Parking = trim($_POST['Parking']);
            } else {
                $Parking = "";
            }
            $Sell_rent = trim($_POST['Sell_rent']);
            if (!empty($_POST['description'])) {
                $description = trim($_POST['description']);
            } else {
                $description = "";
            }


            $db = new DataBase;
            if ($db->select("SELECT * FROM realestate WHERE Address='$Address'")) {
                $error = ' ملک  ' . $Address . '  قبلا ثبت شده است';
                $this->render('users/melk', compact('errors', 'error', 'message', 'Address', 'Construction', 'Meterage', 'Direction', 'Floors', 'units', 'Floor', 'owner', 'phone'));
            } elseif (!empty($_FILES['image']['name'])) {
                $imageName = $_FILES['image']['name'];
                $imageType = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $location = 'images/';
                $offset = 0;
                while ($strpos = strpos($imageName, '.', $offset)) {
                    $offset = $strpos + 1;
                    $extension = strtolower(substr($imageName, $offset));
                }
                if (($extension == 'jpg' || $extension == 'jpeg') && $imageType == 'image/jpeg') {
                    if (move_uploaded_file($tmp_name, $location . $imageName)) {
                        $db->change("INSERT  INTO realestate VALUES ('','$owner','$phone','$Address','$Construction','$Meterage','$Direction','$Floors','$units','$Floor','$Elevator','$Parking','$description','$Sell_rent')");
                        $melk_id = $db->getField("SELECT melk_id FROM realestate WHERE Address='$Address'", 'melk_id');
                        $db->change("INSERT  INTO images VALUES ('','$melk_id','$imageName')");
                        $latitude = trim($_GET['latitude']);
                        $lngitude = trim($_GET['lngitude']);
                        $db->change("INSERT  INTO location VALUES ('','$melk_id','$latitude','$lngitude')");


                        $message = 'ملک شما با موفقیت ثبت شد';
                        $owner = '';
                        $phone = '';
                        $Address = '';
                        $Construction = '';
                        $Meterage = '';
                        $Direction = '';
                        $Floors = '';
                        $units = '';
                        $Floor = '';

                        $this->render('users/melk', compact('errors', 'error', 'message', 'Address', 'Construction', 'Meterage', 'Direction', 'Floors', 'units', 'Floor', 'owner', 'phone'));
                    }
                } else {
                    $error = 'تصویر باید از نوع jpg/jpeg باشد';
                    $this->render('users/melk', compact('errors', 'error', 'message', 'Address', 'Construction', 'Meterage', 'Direction', 'Floors', 'units', 'Floor', 'owner', 'phone'));
                }
            }
        } else {
            $error = 'لطفا فیلدهای خالی را وارد کنید';
            $this->render('users/melk', compact('errors', 'error', 'message', 'Address', 'Construction', 'Meterage', 'Direction', 'Floors', 'units', 'Floor', 'owner', 'phone'));
        }
    }
}
