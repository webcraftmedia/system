<div id="table-wrapper">
    <ul class="nav nav-pills" id="error_filter">    
        <li class="nav-item ${filter_all}"><a class="nav-link" href="#!${state};filter.all;search.${search}">${basic_all}</a></li>
        <li class="nav-item ${filter_mine}"><a class="nav-link" href="#!${state};filter.mine;search.${search}">${basic_mine}</a></li>
        <li class="nav-item ${filter_free}"><a class="nav-link" href="#!${state};filter.free;search.${search}">${basic_free}</a></li>
        <li class="nav-item ${filter_others}"><a class="nav-link" href="#!${state};filter.others;search.${search}">${basic_others}</a></li>
        <li class="nav-item ${filter_gen}"><a class="nav-link" href="#!${state};filter.gen;search.${search}">${basic_generated}</a></li>
        <li class="nav-item ${filter_user}"><a class="nav-link" href="#!${state};filter.user;search.${search}">${basic_user}</a></li>
        <li class="nav-item ${filter_report}"><a class="nav-link" href="#!${state};filter.report;search.${search}">${basic_report}</a></li>
        <button class="btn-sm btn btn-success" state="${state};filter.${filter};search." id="btn_search_todo" type="submit" style="float: right; margin-left: 10px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> ${basic_search}</button>
        <input class="input-medium search-query action-control" id="input_search_todo" type="text" placeholder="${basic_placeholder_search}" size="20" style="float: right;" value="${search}"/>
    </ul>
    <h6>${basic_rows}: ${count} ${basic_page}: ${page}</h6>
    <table class="table table-hover table-condensed">
        <tr>
            <th>${time_ago}</th>
            <th>${table_message}</th>
            <th>${table_author}</th>
            <th>${table_assignee}</th>
        </tr>
        ${todo_list_elements}
    </table>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#!${state};filter.${filter};search.${search};page.0">&laquo;</a></li>
        ${pagination}
        <li class="page-item"><a class="page-link" href="#!${state};filter.${filter};search.${search};page.${page_last}">&raquo;</a></li>
    </ul>
</div>