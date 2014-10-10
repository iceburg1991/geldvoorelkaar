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
    private $file_path = "file_upload/";
    
    function __construct($filename='', $delimiter=','){
        $this->filename = $filename;
        $this->delimiter = $delimiter;
    }
    
    function csv_to_array()
    {
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