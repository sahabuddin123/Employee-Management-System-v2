<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="">
        <title>Employee Management System</title>
        
    </head>
    <body>
        <h4 class="grey-text text-darken-1 center">Employee Hired Report</h4>
        <table border="0" width="90%" align="center">
                    <tr>
                        <td rowspan="3">
                            <img src="storage/{{$employee->picture}}" alt="blank" style="height:150px;width:140px;padding:0;margin:0">
                        </td>
                        <td colspan="2" style="color:#ff0000;">Employees ID :</td>
                        <td style="color:blue;"> {{ $employee->id }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="color:#ff0000;">Salary : </td>
                        <td style="color:blue;" > {{ $employee->empSalary->s_amount }}/-</td> 
                    </tr>
                    <tr>
                        
                        <td colspan="2" style="color:#ff0000;">Email :</td>
                        <td style="color:#0000ff;"></td> 
                    </tr>
                    <tr>
                        <td  style="color:#ff0000;"><h3>Name : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->first_name }} {{ $employee->last_name }}</h3></td>
                        <td  style="color:#ff0000;"><h3>Sex : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->empGender->gender_name }}</h3></td>
                    </tr>
                    <tr>
                        <td  style="color:#ff0000;"><h3>Phone : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->phone }}</h3></td>
                        <td  style="color:#ff0000;"><h3>Tel : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->phone }}</h3></td>
                    </tr>
                    <tr>
                        <td  style="color:#ff0000;"><h3>Department : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->empDepartment->dept_name }}</h3></td>
                        <td  style="color:#ff0000;"><h3>Age : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->age }}</h3></td>
                    </tr>
                    <tr>
                        <td  style="color:#ff0000;"><h3>Country : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->empCountry->country_name }}</h3></td>
                        <td  style="color:#ff0000;"><h3>Division : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->empDivision->division_name }}</h3></td>
                    </tr>
                    <tr>
                        <td  style="color:#ff0000;"><h3>State : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->empState->state_name }}</h6></td>
                        <td  style="color:#ff0000;"><h3>City : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->empCity->city_name }}</h6></td>
                    </tr>
                    <tr>
                        <td  style="color:#ff0000;"><h3>Join Date : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->join_date }}</h3></td>
                        <td  style="color:#ff0000;"><h3>Date of birth : </h3></td>
                        <td style="color:blue;" ><h3>{{ $employee->birth_date }}</h3></td>
                    </tr>
                    <tr>
                        <td colspan="1" style="color:#ff0000;"><h3>Address : </h3></td>
                        <td colspan="3"style="color:blue;" ><h3>{{ $employee->address }}</h3></td>
                        
                    </tr>
                    <tr>
                        <td  style="color:#ff0000;"><h3>Email :</h3></td>
                        <td style="color:blue;" colspan="3"><h3>{{ $employee->email }}</h3></td>
                        
                    </tr>
        </table>
    </body>
</html>