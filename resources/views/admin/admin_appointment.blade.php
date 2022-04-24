

<x-app-layout >
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  
  @include('admin.admincss')

  </head>
  <body>
  <div class="bg-dark container-scroller"> 
  
  
  
    @include('admin.navbar')
    <!-- right side -->
    
    <div class="container my-5">
    
        <center><h3 class="font-weight-bold my-5 text-white" >Appointment Details</h3></center>
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                <th scope="col">Patient Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($data as $appoint)
                <tr>
                    <td>{{$appoint->name}}</td>
                    <td>{{$appoint->email}}</td>
                    <td>{{$appoint->phone}}</td>
                    <td>{{$appoint->doctor}}</td>
                    <td>{{$appoint->date}}</td>
                    <td>{{$appoint->message}}</td>
                    <td>{{$appoint->status}}</td>
                    <td><a class="btn btn-danger" href="{{url('/approved',$appoint->id)}}" >Approve</a></td>
                    <td><a class="btn btn-success" href="{{url('/cancelled',$appoint->id)}}" >Cancel</td>
                    <td><a class="btn btn-primary" href="{{url('/emailview',$appoint->id)}}" >Send Mail</td>
                </tr>    
                @endforeach
                
            </tbody>
        </table>

    </div>

    
      
    

  </div>
    @include('admin.adminscript')

  </body>
</html>