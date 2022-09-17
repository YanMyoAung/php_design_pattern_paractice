<?php

interface ReportHeader{
     public function generateHeader() : string;
}

interface ReportBody{
     public function generateBody() : string;
}

class HTMLReportHeader implements ReportHeader{
    public function generateHeader() : string
    {
        return "HTML REPORT HEADER \n";
    }
}

class HTMLReportBody implements ReportBody{
    public function generateBody() : string
    {
        return "HTML REPORT BODY \n";
    }
}

class PDFReportHeader implements ReportHeader{
    public function generateHeader() : string
    {
        return "PDF REPORT HEADER \n";
    }
}

class PDFReportBody implements ReportBody{
    public function generateBody() : string
    {
        return "PDF REPORT BODY \n";
    }
}

abstract class ReportFactory{
    abstract public function createHeader() : ReportHeader;
    abstract public function createBody() : ReportBody;
}

class HTMLReportFactory extends ReportFactory{
    public function createHeader() : ReportHeader
    {
        return new HTMLReportHeader();
    }

    public function createBody() : ReportBody
    {
        return new HTMLReportBody();
    }
}

class PDFReportFactory extends ReportFactory{
    public function createHeader() : ReportHeader
    {
        return new PDFReportHeader();
    }

    public function createBody() : ReportBody
    {
        return new PDFReportBody();
    }
}

class ReportCommandClient{

    const PDF = 'PDF';
    const HTML = "HTML";

    public function __construct(private string $type)
    {
        
    }
    
    public function generate(){
        switch($this->type){
            case self::PDF : 
                return new PDFReportFactory;
                break;
            case self::HTML : 
                return new HTMLReportFactory;
                break;
            default : 
                return new HTMLReportFactory; 
        }
    }
}

$client = new ReportCommandClient(ReportCommandClient::PDF);
$command = $client->generate();
echo $command->createHeader()->generateHeader();

?>