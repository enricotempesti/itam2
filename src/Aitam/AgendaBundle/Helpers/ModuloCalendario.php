<?php

namespace Aitam\AgendaBundle\Helpers;

use Aitam\AgendaBundle\Helpers\ActiveCalendar;

/*
 * @ORM\Entity(repositoryClass="Aitam\AgendaBundle\Repository\MynewsRepository")
 * @ORM\Table(name="mynews")
 */

class ModuloCalendario extends ActiveCalendar {

    protected $em;

    public function __construct($em) {

        $this->em = $em;
    }

    public function MoCalendario() {

        $sqlID = $this->em->getRepository("AitamAgendaBundle:mynews")->getAgendasql();

        $yearID = false; // GET variable for the year (set in Active Calendar Class), init false to display current year
        $monthID = false; // GET variable for the month (set in Active Calendar Class), init false to display current month
        $dayID = false; // GET variable for the day (set in Active Calendar Class), init false to display current day

        extract($_GET);

        $cal = new ActiveCalendar($yearID, $monthID, $dayID);
        $eventID = "event"; // sets the name of the generated HTML class on the event day (css layout)
       // $vv = new \DateTime;
        //var_dump($sqlID);

     // $s = $vv->format('Y-m-d');
        
        foreach ($sqlID as $id) {
            $s = $id['newsdata'];
           
            $mysqlDay = $s->format('d'); // makes a day out of the database date
            $mysqlMonth = $s->format('m'); // makes a month out of the database date
            $mysqlYear = $s->format('Y'); // makes a year out of the database date
            $mysqlContent = $id['newstitle']; // gets the event content
            $mysqlLink = "infoevento/$id[id]"; // gets the event link
            $cal->setEvent($mysqlYear, $mysqlMonth, $mysqlDay, $eventID); // set the event, if you want the whole day to be an event
            $cal->setEventContent($mysqlYear, $mysqlMonth, $mysqlDay, $mysqlContent, $mysqlLink); // set the event content and link
        }

        return $cal;
    }

}