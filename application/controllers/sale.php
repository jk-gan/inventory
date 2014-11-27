<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('sale_model');
        $this->load->model('inventory_model');
        $this->load->library("Pdf");
        
        if(!$this->session->userdata('is_logged_in'))
		{
            redirect('users');
        }
    }

	public function index()
	{
		$this->all();
	}
	
	public function add_sale()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
            $this->form_validation->set_rules('item', 'Item', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');

			if($this->form_validation->run())
			{
				$item = $this->input->post('item');
				$quantity = $this->input->post('quantity');
				$price = $this->input->post('price');
				$subtotal = $this->input->post('subtotal');

				for($i = 0; $i<sizeof($item); $i++)
				{
					$current_quantity = $this->sale_model->get_quantity($item[$i]);
					$item_quantity['quantity'] = $current_quantity[0]['quantity'] - $quantity[$i];
					if($item_quantity['quantity'] > 0)
						$this->sale_model->update($item[$i], $item_quantity);
				}


				// insert to tb_sale
				$data['total'] = $this->input->post('total');
				$data['totalProfit'] = 0;
				for($i = 0; $i<sizeof($item); $i++)
				{	
					$profit = $this->sale_model->get_profit($item[$i]);
					$profit *= $quantity[$i];
					$data['totalProfit'] += $profit;
				}
				$data['dateAdded']	=	date("Y-m-d H:i:s");
				$data['empID'] = $this->session->userdata('id');
				$id = $this->sale_model->insert_sale($data);
				
				$addnew['receiptID'] = "SE_".$id;
				$this->sale_model->update($id, $addnew);

				for($i = 0; $i<sizeof($item); $i++)
				{
					$insert = array(
					'inventoryID'	=>	$item[$i],
					'quantity'	=>	$quantity[$i],
					'retailPrice'		=>	$price[$i],
					'subtotal'	=> $subtotal[$i],
					'empID' => $this->session->userdata('id'),
					'saleID' => $id,
					'dateAdded'	=>	date("Y-m-d H:i:s")
					);

				$this->sale_model->add($insert);
				}
				
				$new['pdf'] = $this->create_pdf($id);
				$this->sale_model->update($id, $new);
				redirect('sale');
			}
        }
        
		$page['title']    	= "Add Sale";
		$page['breadcrumb'] 	= "Add Sale";
	
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content'] = 'add_sale';
		$data['item'] = $this->inventory_model->get_items();

        $this->load->view('template/master', $data); 
	}

	public function all()
	{
		$page['title']    	= "Sales";
		$page['breadcrumb'] 	= "Sales";
		
		$data['header']   	= $this->load->view('include/header', $page, true);
		$data['breadcrumb'] 	= $this->load->view('include/breadcrumb', $page, true);
        $data['content']   = 'view_sale';
		
		// $config["base_url"] = base_url()."vendor/index";
		// $config["total_rows"] = $this->payment_model->record_count();
		// $config["per_page"] = 10;
		// $config["uri_segment"] = 3;

		// $this->pagination->initialize($config);
		// $start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->payment_model->limit($config["per_page"], $start);
		// $data["links"] = $this->pagination->create_links();
		
        $data['results'] = $this->sale_model->get_all();
        $this->load->view('template/master', $data); 
    }

	public function get_item()
	{

		$inventory = $this->inventory_model->get_items();
		echo '<option value="">Choose an Inventory</option>';
		foreach ($inventory as $row)
	    {
	        echo '<option value="';
	        echo $row['inventoryID'];
	        echo '">';
	        echo $row["itemName"];
	        echo '</option>';
	    }

	}

	public function get_quantity($id="")
	{
		$data = $this->inventory_model->get_quantity($id);
		echo $data[0]['quantity'];
	}

	public function get_price($id="")
	{
		
		$price = $this->inventory_model->get_price_by_id($id);
		echo $price[0]['retailPrice'];
	}

public function create_pdf($id = "")
{
    //============================================================+
    // File name   : example_001.php
    // Begin       : 2008-03-04
    // Last Update : 2013-05-14
    //
    // Description : Example 001 for TCPDF class
    //               Default Header and Footer
    //
    // Author: Nicola Asuni
    //
    // (c) Copyright:
    //               Nicola Asuni
    //               Tecnick.com LTD
    //               www.tecnick.com
    //               info@tecnick.com
    //============================================================+
 
    /**
    * Creates an example PDF TEST document using TCPDF
    * @package com.tecnick.tcpdf
    * @abstract TCPDF - Example: Default Header and Footer
    * @author Nicola Asuni
    * @since 2008-03-04
    */
 
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
 
    // set default header data
    $pdf->SetHeaderData("chess_logo.png", 25, "Shopping receipt", "by XXX IT Shop", array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
 
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
    // ---------------------------------------------------------    
 
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);   
 
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
 
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
 
    // Set some content to print
//     $html = <<<EOD
//     <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
//     <i>This is the first example of TCPDF library.</i>
//     <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
//     <p>Please check the source code documentation and other examples for further information.</p>
//     <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
// EOD;
    $data['results'] = $this->sale_model->get_sale_for_pdf($id);
    $html = $this->load->view('pdf/sale','',true);
    $html = str_replace("[date;;]", mdate("%Y-%m-%d", human_to_unix($data['results'][0]['dateAdded'])), $html);
    
    $_list = NULL;
    $i = 1;
    foreach($data['results'] as $row)
    {
        $_list .= '<tr>
                        <td style="border:solid black 1px">'.$i.'</td>
                        <td style="border:solid black 1px; text-align:left">'.$row['itemName'].'</td>
                        <td style="border:solid black 1px">'.$row['quantity'].'</td>
                        <td style="border:solid black 1px">'.$row['retailPrice'].'</td>
                        <td style="border:solid black 1px">'.$row['subtotal'].'</td>
                    </tr>';
		$i++;
	}
	$html = str_replace("[receiptNo;;]", "RE_".$id, $html);
	$html = str_replace("[list;;]", $_list, $html);
	$html = str_replace("[total;;]", $data['results'][0]['total'], $html);
    // str_replace("[list;;]", $list, $html);
 
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    // ---------------------------------------------------------    
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $filename = "sale_pdf_id_".$id.'.pdf';
    $pdf->Output('assets/pdf/sale/'.$filename, 'F');    
    return $filename;
    //============================================================+
    // END OF FILE
    //============================================================+
    }
}

/* End of file sale.php */
/* Location: ./application/controllers/sale.php */
