<div id="card-widgets">
    <div class="row">
        <div class="col s12">
            <ul id="task-card" class="collection with-header">
                <li class="collection-header red">
                    <div class="row">
                        <h4 class="task-card-title col s10">Today Tasks</h4>
                        <div class="col s1">
                            <a href="javascript:;" class="close-task-panel white-text"><i class="material-icons">close</i></a>
                        </div>
                    </div>

                </li>

                    @for($i=1; $i<=10;$i++)
                        <li class="collection-item dismissable"
                            style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <input type="checkbox" id="task{!! $i !!}">
                            <label for="task{!! $i !!}" style="text-decoration: none;">
                                Contrary to popular belief, Lorem Ipsum is not simply random text
                                <a href="#" class="secondary-content"><span
                                            class="ultra-small">{!! date('d.m.Y') !!}</span></a>
                            </label>

                            <span class="task-cat teal">Dr. Mujtaba Ahmad</span>

                        </li>
                    @endfor

            </ul>
        </div>
    </div>


</div>