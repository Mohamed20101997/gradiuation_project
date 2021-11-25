<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
        @if(auth()->guard('admin')->check())
          <p class="app-sidebar__user-name">{{auth()->guard('admin')->user()->name}}</p>
          <p class="app-sidebar__user-designation">{{auth()->guard('admin')->user()->email}}</p>
        @else
            <p class="app-sidebar__user-name">{{auth()->guard('doctor')->user()->name}}</p>
            <p class="app-sidebar__user-designation">{{auth()->guard('doctor')->user()->email}}</p>
        @endif
    </div>
  </div>
    @if(auth()->guard('admin')->check())
  <ul class="app-menu">
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'admin.index' ? 'active' : ''}}" href="{{ route('admin.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Admins</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'doctor.index' ? 'active' : ''}}" href="{{ route('doctor.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Doctors</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'college.index' ? 'active' : ''}}" href="{{ route('college.index') }}"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Colleges</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'semester.index' ? 'active' : ''}}" href="{{ route('semester.index') }}"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Semesters</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'subject.index' ? 'active' : ''}}" href="{{ route('subject.index') }}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Subjects</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'student.index' ? 'active' : ''}}" href="{{ route('student.index') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Students</span></a></li>
  </ul>
    @else
        @if(count(colleges()) > 0)
            @foreach(colleges() as $college)
                <li><a class="app-menu__item" href="{{ route('colleges.index', $college->id) }}"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">{{$college->name}}</span></a></li>
            @endforeach
        @endif
    @endif
</aside>
