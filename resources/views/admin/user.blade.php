@extends('admin.layouts.main')
    <!-- This is an example component -->

   @section('container')
<div>
  @include('admin.partials.sidebar')
  
     
<main>
    <div className="col-span-1 overflow-auto bg-white shadow-lg p-4">
        <table className="table-auto border w-full my-2">
          <thead>
            <tr>
              <th className="px-4 py-2 border">No</th>
              <th className="px-4 py-2 border">Nama</th>
              <th className="px-4 py-2 border">alamat</th>
              <th className="px-4 py-2 border">No Hp</th>
              <th className="px-4 py-2 border">Updated at</th>
              <th className="px-4 py-2 border">Actions</th>
            </tr>
          </thead>
          <tbody>
           
          </tbody>
        </table>
        <div className="text-sm text-gray-600 mt-2">
        </div>
      </div>
</main>
         

</div>



   @endsection
