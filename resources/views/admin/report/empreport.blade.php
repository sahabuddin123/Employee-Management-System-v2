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
        <h4 class="">Employee Hired Report</h4>
        <table width="100%" border="1" height="100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Zip Code</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Salary</th>
                    <th>Department</th>
                    <th>Division</th>
                    <th>age</th>
                    <th>address</th>
                    <th>Join Date</th>
                    <th>Birth Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>{{$employee->empCity->zip_code}}</td>
                        <td>{{$employee->empCountry->country_name}}</td>
                        <td>{{$employee->empState->state_name}}</td>
                        <td>{{$employee->empCity->city_name}}</td>
                        <td>{{$employee->empSalary->s_amount}}</td>
                        <td>{{$employee->empDepartment->dept_name}}</td>
                        <td>{{$employee->empDivision->division_name}}</td>
                        <td>{{$employee->age}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->join_date}}</td>
                        <td>{{$employee->birth_date}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>