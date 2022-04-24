

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
    
        <center><h3 class="font-weight-bold my-5 text-white" >Doctor Details</h3></center>
        <table class="table table-striped bg-white">
            <thead>
                <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Speciality</th>
                <th scope="col">Room</th>
                <th scope="col">Image</th>
                <th></th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($data as $doctor)
                <tr>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->speciality}}</td>
                    <td>{{$doctor->room}}</td>
                    <td><img src="doctorimage/{{$doctor->image}}" style="border-radius: 0;width:100px;height:100px"></td>
                    <td><a class="btn btn-danger" href="{{url('/dlt_doctor',$doctor->id)}}" onclick="return confirm('Are You Sure?')" >Delete</a></td>
                    <td><a class="btn btn-success" href="{{url('/update_doctor',$doctor->id)}}" >Update</td>
                </tr>    
                @endforeach
                
            </tbody>
        </table>

    </div>

    
      
    

  </div>
    @include('admin.adminscript')

  </body>
</html>