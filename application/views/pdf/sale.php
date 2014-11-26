<?php
//     $_list = NULL;
//     $i = 1;
//     foreach($results as $row){
//         $_list .= '<tr>
//                         <td>'.$i.'</td>
//                         <td>'.$row['itemName'].'</td>
//                         <td>'.$row['quantity'].'</td>
//                         <td>'.$row['retailPrice'].'</td>
//                         <td>'.$row['subtotal'].'</td>
//                         <td><a href="#">[pdf file]</a></td>
//                     </tr>';
// $i++;
//     }
  
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sale</title>
</head>
<body>
	<table>
		<tr>
			<td>Date & Time</td>
			<td>[date;;]</td>
			<!-- <td><?php echo $results['dateAdded'];?></td> -->		
		</tr>
		<tr>
			<td width="30px">No</td>
            <td width="200px">Item</td>
            <td width="80px">Quantity</td>
            <td width="100px">Price(RM)</td>
            <td width="130px">Subtotal(RM)</td>
		</tr>
			[list;;]
	</table>
</body>
</html>