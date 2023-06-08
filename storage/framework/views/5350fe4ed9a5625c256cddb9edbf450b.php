<div class="text-center">
    <h1>Project Management Tools</h1>
</div> 

<?php if(Route::current()->getName() != 'dashboard' && Route::current()->getName() != 'feedback.index' && Route::current()->getName() != 'feedback.create' && Route::current()->getName() != 'feedback.edit'): ?>
<nav class="navbar navbar-expand-lg navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper d-none">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#"><?php echo e($page ?? __('Dashboard')); ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <?php if(isset($project_id)): ?>
            <ul class="navbar-nav">
                <li>
                    <a class="nav-link" href="<?php echo e(route('project.select',['id'=>$project_id])); ?>"><?php echo e(__('Project List')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('sprint.select',['id'=>$project_id])); ?>"><?php echo e(__('Sprint')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('task.select',['id'=>$project_id])); ?>"><?php echo e(__('Task')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('userstory.select',['id'=>$project_id])); ?>"><?php echo e(__('User Stories')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('team.select',['id'=>$project_id])); ?>"><?php echo e(__('Team')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('status.select',['id'=>$project_id])); ?>"><?php echo e(__('Status')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('kb.select',['id'=>$project_id])); ?>"><?php echo e(__('Kanban Board')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('perfeature.select',['id'=>$project_id])); ?>"><?php echo e(__('Performance Feature')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('secfeature.select',['id'=>$project_id])); ?>"><?php echo e(__('Security Feature')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('codestand.select',['id'=>$project_id])); ?>"><?php echo e(__('Coding Standard')); ?></a>
                </li>
                <li>
                    <a class="nav-link" href="<?php echo e(route('role.select',['id'=>$project_id])); ?>"><?php echo e(__('Role')); ?></a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="navbar-nav">
                <li>
                    <a href="<?php echo e(route('project.index')); ?>"><?php echo e(__('Project List')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('sprint.index')); ?>"><?php echo e(__('Sprint')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('task.index')); ?>"><?php echo e(__('Task')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('userstory.index')); ?>"><?php echo e(__('User Stories')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('team.index')); ?>"><?php echo e(__('Team')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('status.index')); ?>"><?php echo e(__('Status')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('kb.index')); ?>"><?php echo e(__('Kanban Board')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('perfeature.index')); ?>"><?php echo e(__('Performance Feature')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('secfeature.index')); ?>"><?php echo e(__('Security Feature')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('codestand.index')); ?>"><?php echo e(__('Coding Standard')); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(route('role.index')); ?>"><?php echo e(__('Role')); ?></a>
                </li>
            </ul>
            <?php endif; ?>
            
            <ul class="navbar-nav ml-auto">
                
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="<?php echo e(asset('white')); ?>/img/anime3.png" alt="<?php echo e(__('Profile Photo')); ?>">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none"><?php echo e(__('Log out')); ?></p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="<?php echo e(route('profile.edit')); ?>" class="nav-item dropdown-item"><?php echo e(__('Profile')); ?></a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item"><?php echo e(__('Settings')); ?></a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="<?php echo e(route('logout')); ?>" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><?php echo e(__('Log out')); ?></a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="<?php echo e(__('SEARCH')); ?>">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('Close')); ?>">
                    <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\SAgile\resources\views/layouts/navbars/navs/auth.blade.php ENDPATH**/ ?>