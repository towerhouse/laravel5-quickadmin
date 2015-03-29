@extends('app')

@section('content')
  <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Users</h3>

      <div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                      <div class="row">
                       <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> List</h4></div>
                      <div class="col-md-6"><a href="{{ url('users/edit') }}" class="btn btn-theme" type="button">New user</a></div>
                      </div>
                      <hr>
                      @if (count($users))
                      <thead>
                          <tr>
                              <th><i class="fa fa-user"></i> Name</th>
                              <th class="hidden-phone"><i class="fa fa-envelope-o"></i> Email</th>
                              <th><i class="fa fa-calendar"></i> Created at</th>
                              <th><i class=" fa fa-tag"></i> Roles</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                          <tr>
                              <td><a href="{{ url('users/edit/' . $user->id) }}">{{ $user->name }}</a></td>
                              <td class="hidden-phone">{{ $user->email }}</td>
                              <td>{{ date('M d, Y', strtotime($user->created_at)) }}</td>
                              <td>
                                  @foreach($user->roles as $role)
                                  <span class="label label-info label-mini">{{ $role->name }}</span>
                                  @endforeach
                              </td>
                              <td>
                                  <a href="{{ url('users/edit/' . $user->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                  <a data-toggle="confirmation" data-id="{{ $user->id }}" href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      @endif
                  </table>
              </div><!-- /content-panel -->
              {!! $users !!}
          </div><!-- /col-md-12 -->
      </div><!-- /row -->

  </section>
  @section("scripts")
  @parent
  <script type="text/javascript" src="{{ asset('js/bootstrap-confirmation/bootstrap-confirmation-2.1.2.min.js') }}"></script>
  <script>
      $('[data-toggle="confirmation"]').confirmation({
        placement: "top",
        onConfirm: function() {
          var user_id = $(this).attr("data-id");
          $(this).parent().parent().remove();
          $.post("{{ url('users/destroy') }}", { id: user_id, _token: "{{ csrf_token() }}" });
        }
      });
  </script>
  @stop 
@endsection
