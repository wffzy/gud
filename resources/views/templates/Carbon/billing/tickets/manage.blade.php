@include('templates.Carbon.inc.header')
    @include('templates.Carbon.inc.navbar', ['active_nav' => 'new_ticket'])
    <div class="grey-bg container-fluid">
      @extends('templates/wrapper', [
      'css' => ['body' => 'bg-neutral-800'],
      ])
    @section('container')
  

    <div class=" py-md pt-5">
  
          <div class="row">
            
<div class="col-xl-4 order-xl-2 mt-6">
	<div class="card card-profile">
		<div class="row justify-content-center">
			<div class="col-lg-3 order-lg-2">
				<div class="card-profile-image">
					<a href="#">
						<img src="https://www.gravatar.com/avatar/53a745f24861469a18ae2607d96dbc66?s=160" class="rounded-circle">
					</a>
				</div>
			</div>
		</div>
		<div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
		</div>
		<div class="card-body pt-0">
			<div class="row">
				<div class="col">
					<div class="card-profile-stats d-flex justify-content-center">
						<div>
							<span class="heading">$ 35 ALL</span>
							<span class="description">Balance</span>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center">
				<h5 class="h3">
						owner owner<span class="font-weight-light"></span>
				</h5>
				<div class="h5 font-weight-300">
					<i class="ni location_pin mr-2"></i><strong>admin@vertisanpro.com</strong>
				</div>
				<div class="h5 mt-4">
					<i class="ni business_briefcase-24 mr-2"></i><strong>2022-10-18 10:50:18</strong>
				</div>
				<div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-xl-8 order-xl-2 mt-6">

<div class="card-header d-inline-block w-full mb-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="media align-items-center">
                      <img alt="Image" src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}?s=160" class="avatar shadow">
                      <div class="media-body ml-2"> 
                        <h4 class="mb-0 d-block">{{ Auth::user()->username }} @if(Auth::user()->root_admin) <span class="badge badge-danger ml-1">STAFF MEMBER</span>@else <span class="badge badge-defaut ml-1">Client</span>@endif </h4>
                        <h6 class="text-muted text-small">New Ticket</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                <div class="row justify-content-start">
                    <form action="{{ route('tickets.manage.response', ['uuid' => $ticket->uuid]) }}" method="POST">
                        @csrf
                        <label class="form-control-label">Message</label>
                        <textarea required name="response"><code></code></textarea>
                    <div class="col-md-12" style="display: flex;justify-content: flex-end;">
                        <button type="submit" class="btn btn-primary mt-4" style="width: 15%">Create Ticket</button>
                    </div>
                     </form>
                </div>
              </div>

                  <div class="col-md-1 col-3">
                  </div>
                </div>
              </div>

              
@foreach($responses as $response)
<div class="card-header d-inline-block w-full mb-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="media align-items-center">
                      <img alt="Image" src="https://www.gravatar.com/avatar/{{ md5(strtolower($user->find($ticket->user_id)->email)) }}?s=160" class="avatar shadow">
                      <div class="media-body ml-2"> 
                        <h4 class="mb-0 d-block">{{ $user->find($ticket->user_id)->username }} @if($user->find($ticket->user_id)->root_admin) <span class="badge badge-danger ml-1">STAFF MEMBER</span> @else <span class="badge badge-default ml-1">Client</span> @endif</h4>
                        <h6 class="text-muted text-small">{{ $response->created_at->diffForHumans() }}</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                <div class="row justify-content-start">
                    <code>{!! $response->data !!}</code>
                </div>
              </div>
                  <div class="col-md-1 col-3">
                  </div>
                </div>
              </div>
            @endforeach
</div>


            </div>
  
    </div>
  
  
    <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/4/tinymce.min.js"></script>
      <script>
tinymce.init({
  selector: 'textarea',
  height: 150,
  theme: 'modern',
  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,

  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });

    </script>

    <style>
div#mceu_39 {
    display: none;
}

    </style>
  
  
    @endsection
    </div>
    @include('templates.Carbon.inc.style')
    @include('templates.Carbon.inc.script')