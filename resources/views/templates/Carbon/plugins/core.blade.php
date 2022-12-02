<body id="body-pd">
	@include('templates.Carbon.inc.header')
	@include('templates.Carbon.plugins.plugins-sidebar', ['active_nav' => ''])

<div class="grey-bg container-fluid">
    @extends('templates/wrapper', [
    'css' => ['body' => 'bg-neutral-800'],
    ])

    @section('container')

      <!-- Plugins Module -->
  <div class="">

    <div class="nav-wrapper">
      <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 @if($plugins['0']['category']['id'] > 13 and $plugins['0']['category']['id'] < 19 or $plugins['0']['category']['id'] > 21 or $page != 'categories') active @endif" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Spigot</a>



        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 @if($plugins['0']['category']['id'] > 4 and $plugins['0']['category']['id'] < 9) active @endif" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Bungee Spigot</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 @if($plugins['0']['category']['id'] > 9 and $plugins['0']['category']['id'] < 14) active @endif" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Bungee Proxy</a>
        </li>
      </ul>
    </div>

    <div class="card shadow" style="margin-bottom: 15px;">
      <div class="card-body">
        <div class="tab-content" id="myTabContent" style="display: flex; justify-content: space-around;">

          <div class="tab-pane fade @if($plugins['0']['category']['id'] > 13 and $plugins['0']['category']['id'] < 19 or $plugins['0']['category']['id'] > 21 or $page != 'categories') show active @endif" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">





            {{-- Spigot sub categories --}}
            @foreach ($categories as $sub_category)
            @if($sub_category['id'] > 13 and $sub_category['id'] < 19) <a href="/server/{{$server}}/plugins/category/{{$sub_category['id']}}/1" type="button" class="btn btn-primary btn-sm @if($sub_category['id'] == $plugins['0']['category']['id']) @else button-inactive @endif">{{$sub_category['name']}}</a>


              @elseif($sub_category['id'] > 21 and $sub_category['id'] < 27) <a href="/server/{{$server}}/plugins/category/{{$sub_category['id']}}/1" type="button" class="btn btn-primary btn-sm @if($sub_category['id'] == $plugins['0']['category']['id']) @else button-inactive @endif">{{$sub_category['name']}}</a>
                @endif
                @endforeach
                {{-- END Spigot sub categories --}}
          </div>

          <div class="tab-pane fade @if($plugins['0']['category']['id'] > 4 and $plugins['0']['category']['id'] < 9) show active @endif" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">



            {{-- Bungee - Spigot sub categories --}}

            @foreach ($categories as $sub_category)


            @if($sub_category['id'] > 4 and $sub_category['id'] < 9) <a href="/server/{{$server}}/plugins/category/{{$sub_category['id']}}/1" type="button" class="btn btn-primary btn-sm @if($sub_category['id'] == $plugins['0']['category']['id']) @else button-inactive @endif">{{$sub_category['name']}}</a>
              @endif
              @endforeach
              {{-- END Bungee - Spigot sub categories --}}
          </div>

          <div class="tab-pane fade @if($plugins['0']['category']['id'] > 9 and $plugins['0']['category']['id'] < 14) show active @endif" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">



            {{-- Bungee - Proxy sub categories --}}

            @foreach ($categories as $sub_category)


            @if($sub_category['id'] > 9 and $sub_category['id'] < 14) <a href="/server/{{$server}}/plugins/category/{{$sub_category['id']}}/1" type="button" class="btn btn-primary btn-sm @if($sub_category['id'] == $plugins['0']['category']['id']) @else button-inactive @endif">{{$sub_category['name']}}</a>
              @endif
              @endforeach
              {{-- END Bungee - Proxy sub categories --}}

          </div>
        </div>
      </div>

    </div>


    <div class="">

      <div class="search-page-div" style="display: flex;align-items: center;justify-content: space-between;">

        <!-- manual upload modal-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadPlugin" style="height: 48px;">
          Manual Upload
        </button>

        <!-- Modal -->
        <div class="modal fade" id="uploadPlugin" tabindex="-1" role="dialog" aria-labelledby="uploadPluginLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="uploadPluginLabel">Manually Upload Plugins</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h5 style="text-align: center;"><i class='bx bx-download'></i> Drag and Drop </h5>
                <div>
                  <form id="file-form" method="post" enctype="multipart/form-data">
                    <input class="drop-area" type="file" id="files" name="files" multiple>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modal-close" data-dismiss="modal">Close</button>
                <button type="button" onclick="sendFile()" class="btn btn-primary">Upload Plugin</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- page selector-->
        <nav aria-label="page-number">
          <ul class="pagination" style="justify-content: center;">
            <li class="page-item @if ($p == 1) d-none @endif">
              <a class="page-link" href="{{$url}}{{$p - 1}}">
                <i class='bx bxs-chevrons-left'></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>


            @if($p >= 4) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 3}}">{{$p - 3}}</a></li> @endif
            @if($p >= 3) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 2}}">{{$p - 2}}</a></li> @endif
            @if($p >= 2) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 1}}">{{$p - 1}}</a></li> @endif




            <li class="page-item active"><a class="page-link" href="{{$url}}{{$p}}">{{$p}}</a></li>
            <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 1}}">{{$p + 1}}</a></li>
            <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 2}}">{{$p + 2}}</a></li>
            <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 3}}">{{$p + 3}}</a></li>


            @if($p <= 3) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 4}}">{{$p + 4}}</a></li> @endif
              @if($p <= 2) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 5}}">{{$p + 5}}</a></li> @endif
                @if($p <= 1) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 6}}">{{$p + 6}}</a></li> @endif

                  <li class="page-item">
                    <a class="page-link" href="{{$url}}{{$p + 1}}">
                      <i class='bx bxs-chevrons-right' ></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>

          </ul>
        </nav>


        <!-- Search Module-->
        <script>
          function searh(server) {
            find = document.getElementById('SearchPL').value;
            var url = '/server/' + server + '/plugins/search/' + find + '/' + 1;
            window.location.href = url;
          }

        </script>

        <div class="navbar-search navbar-search-light form-inline" id="navbar-search-main">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input onkeydown="if (event.keyCode==13) {searh('{{$server}}', '{{$p}}') };" class=" form-control" id="SearchPL" placeholder="Search" type="text">
            </div>
          </div>
          <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      </div>
    </div>




    <div class="" style="padding-top: 10px;">

      <div class="row">
        @foreach ($plugins as $plugin)

        <?php


				$pl_version = implode(', ', $plugin['testedVersions']);

        if (isset($plugin['premium'])) {
          if ($plugin['premium'] == true) {
            continue;
          }
        }

        $pl_name = preg_replace('/[^A-Za-z0-9\-]/', '', $plugin['name']);
        $pl_name = mb_strimwidth($plugin['name'], 0, 60);
        ?>

        <!-- Modal -->
        <div class="modal fade" id="plugin-{{$plugin['id']}}" tabindex="-1" aria-labelledby="plugin-{{$plugin['id']}}Label" aria-hidden="true">
          <div class="modal-dialog" style="max-width: 80%">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="plugin-{{$plugin['id']}}Label">{{$plugin['name']}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <!-- Modal  Content-->

                <div class="nav-wrapper">
                  <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                      <a class="text-color nav-link mb-sm-3 mb-md-0 active" id="tabs-plugins-overview-{{$plugin['id']}}-1-tab" data-toggle="tab" href="#tabs-plugins-overview-{{$plugin['id']}}-1" role="tab" aria-controls="tabs-plugins-overview-{{$plugin['id']}}-1" aria-selected="true"><i class='bx bxs-plug'></i> Overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="text-color nav-link mb-sm-3 mb-md-0" onclick="getPlVersions('{{$plugin['id']}}', '{{$plugin['name']}}')" id="tabs-plugins-overview-{{$plugin['id']}}-2-tab" data-toggle="tab" href="#tabs-plugins-overview-{{$plugin['id']}}-2" role="tab" aria-controls="tabs-plugins-overview-{{$plugin['id']}}-2" aria-selected="false"><i class='bx bx-git-repo-forked'></i> Version History</a>

                    </li>
                    <li class="nav-item">
                      <a class="text-color nav-link mb-sm-3 mb-md-0" role="tab" target="_blank" href="https://www.spigotmc.org/{{ $plugin['links']['discussion'] }}"><i class='bx bxs-chat'></i> Discussion</a>
                    </li>
                  </ul>
                </div>
                <div class="card shadow">
                  <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                      <!-- Modal Plugin Overview-->
                      <div class="tab-pane fade show active" id="tabs-plugins-overview-{{$plugin['id']}}-1" role="tabpanel" aria-labelledby="tabs-plugins-overview-{{$plugin['id']}}-1-tab">




                        <h5 class="card-title"><img src="@if(empty($plugin['icon']['url']))https://static.spigotmc.org/img/spigot-og.png @else https://www.spigotmc.org/{{$plugin['icon']['url']}} @endif" class="img-thumbnail plugin-icon">
                          {{$plugin['name']}} <br><span>
                            <p class="card-text modal-tagline">{{$plugin['tag']}}</p>
                          </span>
                        </h5>

                        <p class="mb-0 plugin-tags">Author: <a href="https://www.spigotmc.org/members/{{$plugin['author']['id']}}" target="_blank">https://www.spigotmc.org/members/{{$plugin['author']['id']}}</a></p>
                        @if(empty($plugin['contributors'])) @else <p class="mb-0 plugin-tags">Contributors: {{$plugin['contributors']}}</p> @endif
                        <p class="mb-0 plugin-tags">Downloads: {{$plugin['downloads']}}</p>
                        <p class="mb-0 plugin-tags">Minecraft Version(s): {{$pl_version}}</p>


                        <a href="https://www.spigotmc.org/{{$plugin['file']['url']}}" class="btn btn-primary">Download</a>

                      </div>

                      <!-- Modal Plugin Version History-->
                      <div class="tab-pane fade" id="tabs-plugins-overview-{{$plugin['id']}}-2" role="tabpanel" aria-labelledby="tabs-plugins-overview-{{$plugin['id']}}-2-tab">

                        <table class="table">
                          <thead>
                            <tr>
                              <th class="text-center">#</th>
                              <th>Name</th>
                              <th>Version</th>
                              <th>Size</th>
                              <th class="text-right">Downloads</th>
                              <th class="text-right">Actions</th>
                            </tr>
                          </thead>
                          <tbody>


                            <tr>
                              <td class="text-center">{{$plugin['id']}} </td>
                              <td>{{$plugin['name']}} </td>
                              <td>{{$plugin['version']['id'] }}</td>
                              <td>{{$plugin['file']['size'] }} {{$plugin['file']['sizeUnit'] }} </td>
                              <td class="text-right">{{$plugin['downloads']}} </td>
                              <td class="td-actions text-right">
                                <a type="button" rel="tooltip" href="https://www.spigotmc.org/resources/{{ $plugin['id'] }}" target="_blank" class="btn btn-info btn-icon btn-sm btn-simple" data-original-title="" title="">
                                  <i class='bx bx-link-external' style="color: white;"></i>
                                </a>
                                <a type="button" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple" data-original-title="" title="" href="https://www.spigotmc.org/members/{{$plugin['author']['id']}}" target="_blank">
                                  <i class='bx bxs-user-circle'></i>
                                </a>
                                <a type="button" href="https://www.spigotmc.org/{{$plugin['file']['url']}}" rel="tooltip" class="btn btn-success btn-icon btn-sm btn-simple" data-original-title="" title="">
                                  <i class='bx bxs-cloud-download'></i>
                                </a>
                                <button type="button" rel="tooltip" class="btn btn-danger btn-icon btn-sm btn-simple" data-original-title="" title="">
                                  <i class='bx bx-x'></i>
                                </button>
                              </td>
                            </tr>

                          </tbody>
                        </table>

                        </tbody>
                        </table>

                      </div>
                      <div class="tab-pane fade" id="tabs-plugins-overview-{{$plugin['id']}}-3" role="tabpanel" aria-labelledby="tabs-plugins-overview-{{$plugin['id']}}-3-tab">

                      </div>
                    </div>
                  </div>
                </div>




              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="btnm-{{$plugin['id']}}" onclick="upURL('{{$plugin['id']}}', '{{$pl_name}}')" class="btn btn-primary">Install</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Plugins -->
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body" style="min-height: 250px;">
              <div class="icon-title-div">
                <h5 class="card-title">
                  <img style="width: 64px;" src="@if(empty($plugin['icon']['url']))https://static.spigotmc.org/img/spigot-og.png @else https://www.spigotmc.org/{{$plugin['icon']['url']}} @endif" class="img-thumbnail plugin-icon">
                  {{$plugin['name']}}
                </h5>
              </div>
              <p class="card-text plugin-tags">{{$plugin['tag']}}</p>
              <div>
                <button id="btn-{{$plugin['id']}}" onclick="upURL('{{$plugin['id']}}', '{{$pl_name}}')" class="btn btn-primary mb-2">Install</button>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#plugin-{{$plugin['id']}}">
                  View Plugin</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>




    <nav aria-label="page-number">
      <ul class="pagination" style="justify-content: center;">

        <li class="page-item @if ($p == 1) d-none @endif">
          <a class="page-link" href="{{$url}}{{$p - 1}}">
            <i class='bx bxs-chevrons-left'></i>
            <span class="sr-only">Previous</span>
          </a>
        </li>

        @if($p >= 8) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 7}}">{{$p - 7}}</a></li> @endif
        @if($p >= 7) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 6}}">{{$p - 6}}</a></li> @endif
        @if($p >= 6) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 5}}">{{$p - 5}}</a></li> @endif
        @if($p >= 5) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 4}}">{{$p - 4}}</a></li> @endif
        @if($p >= 4) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 3}}">{{$p - 3}}</a></li> @endif
        @if($p >= 3) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 2}}">{{$p - 2}}</a></li> @endif
        @if($p >= 2) <li class="page-item"><a class="page-link" href="{{$url}}{{$p - 1}}">{{$p - 1}}</a></li> @endif


        <li class="page-item active"><a class="page-link" href="#">{{$p}}</a></li>

        <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 1}}">{{$p + 1}}</a></li>

        <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 2}}">{{$p + 2}}</a></li>

        <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 3}}">{{$p + 3}}</a></li>

        <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 4}}">{{$p + 4}}</a></li>

        <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 5}}">{{$p + 5}}</a></li>

        <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 6}}">{{$p + 6}}</a></li>

        <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 7}}">{{$p + 7}}</a></li>



        @if($p <= 7) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 8}}">{{$p + 8}}</a></li> @endif
          @if($p <= 6) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 9}}">{{$p + 9}}</a></li> @endif
            @if($p <= 5) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 10}}">{{$p + 10}}</a></li> @endif
              @if($p <= 4) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 11}}">{{$p + 11}}</a></li> @endif
                @if($p <= 3) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 12}}">{{$p + 12}}</a></li> @endif
                  @if($p <= 2) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 13}}">{{$p + 13}}</a></li> @endif
                    @if($p <= 1) <li class="page-item"><a class="page-link" href="{{$url}}{{$p + 14}}">{{$p + 14}}</a></li> @endif



                      <li class="page-item">
                        <a class="page-link" href="{{$url}}{{$p + 1}}">
                          <i class='bx bxs-chevrons-right' ></i>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
      </ul>
    </nav>
  </div>


    @endsection


</div>
@include('templates.Carbon.inc.style')
@include('templates.Carbon.inc.script')

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="/modules/plugins/js/scripts.js"></script>



<script>
  function upURL(pl_id, pl_name) {
    fetch('{{$app_url}}' + '/server/' + '{{$server}}' + '/plugins/upload/' + pl_id + '/' + pl_name).then(function(response) {
      var btn = document.getElementById('btn-' + pl_id);
      var btnm = document.getElementById('btnm-' + pl_id);
      btn.innerHTML = 'Installed';
      btnm.innerHTML = 'Installed';
      btn.disabled = true;
      btnm.disabled = true;
    });
  }

  function sendFile() {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '{{$app_url}}' + '/server/' + '{{$server}}' + '/pluginsurl/get');
    xhr.send();
    xhr.onload = function() {
      let response = xhr.response;

      var formElement = document.querySelector("form");
      var request = new XMLHttpRequest();
      request.open("POST", response);
      request.send(new FormData(formElement));

      // console.log(response);

    };

    setTimeout(function() {
      let d = document.getElementById('modal-close');
      d.click();
    }, 1200);

  }

  function plData() {

    fetch('https://api.spiget.org/v2/resources/2124')

      .then(function(response) {
        response = response.json();
        //console.log(Object.keys(response));
        console.log(response);
        return response;
      })
      .then(function(Response) {
        // do something with jsonResponse
      });
  }

  function getPlVersions(pl_id, pl_name) {

    fetch('https://api.spiget.org/v2/resources/' + pl_id + '/versions')



      .then(function(response) {
        //response = response.json();
        console.log(Promise.all());


        response.forEach((version) => {
          console.log(version);
        });


      })
      .then(function(Response) {
        // do something with jsonResponse
      });
  }

</script>

<style>
  .drop-area {
    height: 200px;
    width: 100%;
    border: dashed;
    padding: 82px;
    padding-left: 25%;
  }

  .text-color {
    color: var(--text-color) !important;
  }

  .active {
    color:  !important;
  }

  .icon-title-div {
    display: flex;
    justify-content: space-between;
  }

</style>
