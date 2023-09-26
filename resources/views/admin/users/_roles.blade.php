@if ($user->isAdmin())
    <span class="badge" style="background-color: red">Admin</span>
@endif
@if ($user->isUser())
    <span class="badge">User</span>
@endif
@if ($user->isModerator())
    <span class="badge" style="background-color: blue">Moderator</span>
@endif
@if ($user->isTeacher())
    <span class="badge" style="background-color: green">Teacher</span>
@endif
