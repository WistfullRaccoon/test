@if ($user->isWait())
    <span class="badge">Waiting</span>
@endif
@if ($user->isActive())
    <span class="badge" style="background-color: blue">Active</span>
@endif
@if ($user->isBanned())
    <span class="badge" style="background-color: red">Banned</span>
@endif
