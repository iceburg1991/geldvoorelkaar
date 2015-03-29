<?php
/**
 * Convert a comma separated file into an associated array.
 * The first row should contain the array keys.
 * 
 * Example:
 * 
 * @param string $filename Path to the CSV file
 * @param string $delimiter The separator used in the file
 * @return array
 * @link http://gist.github.com/385876
 * @author Jay Williams <http://myd3.com/>
 * @copyright Copyright (c) 2010, Jay Williams
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */
class CsvImporter{
    private $filename;
    private $delimiter;
    private $file_path;
    private $directory = 'file_upload/server/php/files/';
    
    function __construct($delimiter=','){
        $this->filename = $this->directory . $this->getNewestCsv();
        $this->delimiter = $delimiter;
        return;
    }
    
    public function getNewestCsv(){
        $files = scandir($this->directory);
        $files = $this->getTimestamps($files);
        $newestFileValue = max($files);
        $this->filename = array_search($newestFileValue, $files);
        return $this->filename;
    }
    
    /**
     * Create an array with as key the name of the file and as value the getTimestamp
     **/
    private function getTimestamps($files){
        foreach ($files as $key => $value) 
        { 
            //Delete files in Linux which are no files
            if(in_array($value,array(".",".."))){
                unset($files[$key]);
            }
            else{ 
                $newKey = str_replace(".csv","",$value); 
                $newKey = explode("_",$newKey);
                $date = $newKey[1];
                $time = str_replace(".",":",$newKey[2]);
                if($date != null && $time != null){
                    $dateTime = new DateTime($date . " " . $time);
                    $dateTime->format("Y-m-d H:i:s");
                    $dateTime = $dateTime->getTimestamp();
                    $files[$value] = $dateTime;
                }
                unset($files[$key]);
                //Create array met key[filename] en value = timestamp
            }
        }
        return $files;
    }
    
    function csv_to_array()
    {
        if($this->filename == '' || $this->filename == null){
            $this->getNewestCsv();
        }
	    if(!file_exists($this->filename) || !is_readable($this->filename))
		    return FALSE;
	
	    $header = NULL;
	    $data = array();
	    if (($handle = fopen($this->filename, 'r')) !== FALSE)
	    {
		    while (($row = fgetcsv($handle, 1000, $this->delimiter)) !== FALSE)
		    {
			    if(!$header)
				    $header = $row;
			    else
				    $data[] = array_combine($header, $row);
		    }
		    fclose($handle);
	    }
	    return $data;
    }
}