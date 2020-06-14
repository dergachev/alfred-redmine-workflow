<?php

require __DIR__ . '/../vendor/autoload.php';
use Alfred\Workflows\Workflow;


switch($argv[1]) {
  case "--user": 
    echo getUserItems();
    break;
  case "--project": 
    echo getProjectItems();
    break;
  default:
    //not implemented yet
}

function getUserItems() {
  $wf = new Workflow();
  $url =  "http://localhost:9090/users.json?limit=100";

  $response = file_get_contents($url);
  $response = json_decode($response);

  foreach( $response->users as $record ) {
    $timesheet_url = "https://rm.ewdev.ca/time_entries/report?utf8=%E2%9C%93&criteria%5B%5D=project&criteria%5B%5D=issue&set_filter=1&sort=spent_on%3Adesc&f%5B%5D=spent_on&op%5Bspent_on%5D=m&f%5B%5D=user_id&op%5Buser_id%5D=%3D&v%5Buser_id%5D%5B%5D={$record->id}&f%5B%5D=&c%5B%5D=project&c%5B%5D=spent_on&c%5B%5D=user&c%5B%5D=activity&c%5B%5D=issue&c%5B%5D=comments&c%5B%5D=hours&group_by=&t%5B%5D=hours&t%5B%5D=&columns=day&criteria%5B%5D=";

    $wf->result()
      ->title($record->firstname . " " . $record->lastname)
      ->subtitle($record->mail)
      ->arg($timesheet_url)
      ->uid($record->id . time())
      ->valid(true);
  }

  return $wf->output();
}

function getProjectItems() {
  $wf = new Workflow();
  $url =  "http://localhost:9090/projects.json?limit=100";

  $response = file_get_contents($url);
  $response = json_decode($response);

  foreach( $response->projects as $record ) {
    $timesheet_url = "https://rm.ewdev.ca/time_entries/report?utf8=✓&criteria[]=user&criteria[]=issue&set_filter=1&sort=spent_on:desc&f[]=spent_on&op[spent_on]=m&f[]=project_id&op[project_id]==&v[project_id][]={$record->id}&f[]=&c[]=project&c[]=spent_on&c[]=user&c[]=activity&c[]=issue&c[]=comments&c[]=hours&group_by=&t[]=hours&t[]=&columns=day&criteria[]=";

    $wf->result()
      ->title($record->name)
      ->subtitle($record->description)
      ->arg($timesheet_url)
      ->uid($record->id . time())
      ->valid(true);
  }

  return $wf->output();
}
