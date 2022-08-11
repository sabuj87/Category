<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <!-- Bootstrap -->
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


</head>
<body>
    <div class="container p-4" >
        <h4>Add category</h4>

        <form action="{{route('add')}}" method="post">
           @csrf


            <div class="mt-3" >
                <label class="" for="">Category Name</label>
                <input required name="name" type="text" class="form-control mt-3" >
    
    
                
            </div>
            <div class="mt-3" >
                <label class="" for="">Parent</label>
                <select class="form-control mt-2" id=""  required name="parentid" >
                    <option value="" >Primary Category</option>
                    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
   
                    <option value="{{$parent->id}}">{{$parent->name}}</option>
        
                    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)

                    
                   <option value="{{$child->id}}">--{{$child->name}}</option>


                   @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$child->id)->get() as $child2)
                   <option value="{{$child2->id}}">----{{$child2->name}}</option>

                      
                  @endforeach
        
        
         
           @endforeach
        
        
        
           @endforeach
        
                    
    
    
                </select>
                
    
                
            </div>




         <input class="btn btn-primary mt-2" type="submit" value="Add Category" name="" id="">

        </form>

       


    </div>
    
</body>
</html>