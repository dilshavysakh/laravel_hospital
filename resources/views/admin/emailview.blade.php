

<x-app-layout >
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
  
  @include('admin.admincss')

  </head>
  <body>
  <div class="bg-dark container-scroller"> 
  
  
  
    @include('admin.navbar')
    <!-- right side -->
    
    <div class="container my-5">
    <h3 class="font-weight-bold ml-2 text-white">Add Doctor</h3>
      <br>
      <form method="POST" action="{{url('/sendemail',$data->id)}}">
            @csrf
            <div class="col-sm-6">
            <input type="text" class="form-control" id="" name='greeting' placeholder="Greeting" required>
            </div>
            <br>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="body" id="" placeholder="Body" required>
            </div>
            <br>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="actiontext" id="" placeholder="Action Text" required>
            </div> 
            <br>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="actionurl" id="" placeholder="Action Url" required>
            </div> 
            <br>
            <div class="col-sm-6">
            <input type="text" class="form-control" name="endpart" id="" placeholder="End Part" required>
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