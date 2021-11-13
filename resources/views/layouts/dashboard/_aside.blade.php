<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
      <p class="app-sidebar__user-designation">{{auth()->user()->email}}</p>
    </div>
  </div>
  <ul class="app-menu">

      <li><a class="app-menu__item  {{\Request::route()->getName() == 'user.index' ? 'active' : ''}}" href="{{ route('user.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'college.index' ? 'active' : ''}}" href="{{ route('college.index') }}"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Colleges</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'semester.index' ? 'active' : ''}}" href="{{ route('semester.index') }}"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Semesters</span></a></li>
      <li><a class="app-menu__item  {{\Request::route()->getName() == 'subject.index' ? 'active' : ''}}" href="{{ route('subject.index') }}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Subjects</span></a></li>

  </ul>
</aside>
