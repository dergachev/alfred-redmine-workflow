<?php

require __DIR__ . '/../vendor/autoload.php';
use Alfred\Workflows\Workflow;

switch($argv[1]) {
  case "--issue": 
    echo getSearchIssueItems($argv[2]);
    break;
  case "--project": 
    echo getSearchProjectItems($argv[2]);
    break;
  default:
    echo getSearchItems($argv[1]);
}



function getSearchIssueItems($query) {
  echo getSearchItems($query, "&issues=1");
}

function getSearchProjectItems($query) {
  echo getSearchItems($query, "&projects=1");
}

function getSearchItems($query, $filter = "") {

  $wf = new Workflow();

  $url =  "http://localhost:9090/search.json?scope=&limit=50$filter&q=".urlencode( $query ) ;
  $url_html = preg_replace('/\.json/', '', $url);

  $wf->result()
    ->title("Search redmine for \"$query\"...")
    ->subtitle("Visit URL " . $url_html)
    ->arg($url_html)
    ->valid(true);
    
  $response = file_get_contents($url);
  $response = json_decode($response);

  if ($response) {
    foreach( $response->results as $record ) {
      $title =  preg_replace('/\(.*\)/ ', '', $record->title); //remove (open) 
      $title =  preg_replace('/^.*#/','#', $title); //remove TODO (everything until the hash

      $wf->result()
        ->title($title)
        ->subtitle($record->description)
        ->arg($record->url)
        ->uid($record->url . time())
        ->valid(true);
    }
  }

  return $wf->output();
}
