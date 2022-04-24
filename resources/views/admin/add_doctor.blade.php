

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
    <h3 class="font-weight-bold ml-2 text-white">Add Doctor</h3>
      <br>
      <form method="POST" action="{{url('/upload_doctor')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-6">
            <input type="text" class="form-control" id="" name='name' placeholder="Name" required>
            </div>
            <br>
            <div class="col-sm-6">
            <input type="number" class="form-control" name="phone" id="" placeholder="Phone" required>
            </div>
            <br>
            <div class="col-sm-6">
            <input type="number" class="form-control" name="room" id="" placeholder="Room No" required>
            </div> 
            <br>
            <div class="col-sm-6">
            <input type="file" class="form-control" name="image" id="" placeholder="Image" required>
            </div>
            <br>
            <div class="col-sm-6">
             <select name="speciality" class="form-control" required>
                 <option value="">Speciality</option>
                 <option value="Skin">Skin</option>
                 <option value="Eye">Eye</option>
                 <option value="Heart">Heart</option>
                 <option value="General">General</option>
                 <option value="Nose">Dental</option>
             </select>
            </div>
            <br> 
            <div class="col">
            <input type="submit" class="btn btn-success" name="submit" id="" value="Submit">
            </div>
            <br>

            @if(session()->has('message'))
              <div class="alert alert-success" role="alert">
              {{session()->get('message')}}
                <button type="button" class="close" data-dismiss='alert'aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
        </form>

        

    </div>

  </div>
    @include('admin.adminscript')

  </body>
</html>