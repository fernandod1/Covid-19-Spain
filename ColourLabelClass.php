<?php
class ColourLabelClass {

    function getColourRisk($data){
        if($data=="Extremo"||$data=="Alto"){
            $label="danger";
        } else if($data=="Medio"){
            $label="warning";
        } else {
            $label="success";
        }
        return $label;
    }

    function getColourIA($data){
        if (strpos($data, '-') !== false) {
            $label="success";
        } else{
            $label="danger";
        }
        return $label;
    }

    function getColourPassedAway($data){
        if ($data<1) {
            $label="success";
        } else{
            $label="danger";
        }
        return $label;
    }

}
?>