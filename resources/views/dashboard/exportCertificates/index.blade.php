<x-dashboard-layout>
    <div class="col-span-12">
      <div class="card">
        <div class="card-header">
          <h5>{{__('admin.Export Certificates')}}</h5>
        </div>
        <div class="card-body">
          <form action="{{route('admin.exportCertificates.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="input-group mb-4">
                <input type="file" name="file" class="form-control" id="inputGroupFile02" accept=".xlsx,.xls,.csv" />
                <label class="input-group-text" for="inputGroupFile02">
                  {{__('admin.Upload Ur File')}}
                </label>
            </div>
            <div class="alert alert-primary flex items-center mb-4" role="alert">
                <span class="pc-micon mr-2">
                    <span class="pc-micon">
                        <i class="fas fa-info-circle text-primary"></i>
                    </span>
                </span>
                <div>{{__('admin.Please upload the file you want to export certificates (Excel file)')}}</div>
                <a href="{{asset('assets-dashboard/files/template.xlsx')}}" class="btn btn-primary ml-4">
                    {{__('admin.Download Template')}}
                </a>
            </div>
            <div class="m-t-20">
              <button class="btn btn-primary" type="submit">{{__('admin.Upload Ur File')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</x-dashboard-layout>
