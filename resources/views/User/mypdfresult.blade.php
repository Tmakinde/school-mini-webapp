<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name ="_token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>My School App</title>
  <!-- jquery link -->

  <style>
    .table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #eceeef;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #eceeef;
}

.table tbody + tbody {
  border-top: 2px solid #eceeef;
}

.table .table {
  background-color: #fff;
}

.table-sm th,
.table-sm td {
  padding: 0.3rem;
}

.table-bordered {
  border: 1px solid #eceeef;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #eceeef;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-active,
.table-active > th,
.table-active > td {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-hover .table-active:hover > td,
.table-hover .table-active:hover > th {
  background-color: rgba(0, 0, 0, 0.075);
}

.table-success,
.table-success > th,
.table-success > td {
  background-color: #dff0d8;
}

.table-hover .table-success:hover {
  background-color: #d0e9c6;
}

.table-hover .table-success:hover > td,
.table-hover .table-success:hover > th {
  background-color: #d0e9c6;
}

.table-info,
.table-info > th,
.table-info > td {
  background-color: #d9edf7;
}

.table-hover .table-info:hover {
  background-color: #c4e3f3;
}

.table-hover .table-info:hover > td,
.table-hover .table-info:hover > th {
  background-color: #c4e3f3;
}

.table-warning,
.table-warning > th,
.table-warning > td {
  background-color: #fcf8e3;
}

.table-hover .table-warning:hover {
  background-color: #faf2cc;
}

.table-hover .table-warning:hover > td,
.table-hover .table-warning:hover > th {
  background-color: #faf2cc;
}

.table-danger,
.table-danger > th,
.table-danger > td {
  background-color: #f2dede;
}

.table-hover .table-danger:hover {
  background-color: #ebcccc;
}

.table-hover .table-danger:hover > td,
.table-hover .table-danger:hover > th {
  background-color: #ebcccc;
}

.thead-inverse th {
  color: #fff;
  background-color: #292b2c;
}

.thead-default th {
  color: #464a4c;
  background-color: #eceeef;
}

.table-inverse {
  color: #fff;
  background-color: #292b2c;
}

.table-inverse th,
.table-inverse td,
.table-inverse thead th {
  border-color: #fff;
}

.table-inverse.table-bordered {
  border: 0;
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table-responsive.table-bordered {
  border: 0;
}

html {
  font-family:arial;
  font-size: 18px;
}

td {
  border: 1px solid #726E6D;
  padding: 15px;
}

thead{
  font-weight:bold;
  text-align:center;
  background: #625D5D;
  color:white;
}

table {
  border-collapse: collapse;
}

.footer {
  text-align:right;
  font-weight:bold;
}

tbody >tr:nth-child(odd) {
  background: #D1D0CE;
}

  </style>
</head>

<body id ="body">
<table>
    <thead>
      <tr>
        <td colspan="3">Course </td>
        <td rowspan="2"> Semester </td>
        <td rowspan="2"> Credits </td>
        <td colspan="2"> Grade </td>
      </tr>
      <tr>
        <td>Code </td>
        <td colspan="2"> Name </td>
        <td> Letter </td>
        <td> Points </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>CS 225 </td>
        <td colspan="2">Data Structures </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A </td>
        <td> 12.0 </td>
      </tr>
      <tr>
        <td>PHIL 105 </td>
        <td colspan="2">Ethics </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A- </td>
        <td> 10.98 </td>
      </tr>
      <tr>
        <td>ECE 310 </td>
        <td colspan="2">Digital Signal Processing </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A </td>
        <td> 12 </td>
      </tr>
      <tr>
        <td>CS 373 </td>
        <td colspan="2">Combinatorial Algorithms </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> B+ </td>
        <td> 9.99</td>
      </tr>
      <tr>
        <td>MATH 225 </td>
        <td colspan="2">Multi-Variable Calculus </td>
        <td> Fall 2015</td>
        <td> 3.0 </td>
        <td> A- </td>
        <td> 10.98 </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4" class="footer">Total</td>
        <td> 15.0 </td>
        <td colspan="2">55.95 </td>
      </tr>
      <tr>
        <td colspan="4" class="footer">GPA</td>
        <td colspan="3">3.73 / 4.0 </td>
      </tr>
  </table>
</body>
</html>
