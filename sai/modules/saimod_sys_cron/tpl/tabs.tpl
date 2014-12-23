<div id="cron_wrapper">
    <h4>System Cron</h4>
    <hr>
    Last Visit: ${last_visit}<br/>
    <a href="./sai.php?call=cron" target="_blank">Start Cron</a>
    <div id="cron_content">
        <table class="table table-hover table-condensed sai_table" style="overflow: auto;">
            <tr>
                <th>class</th>
                <th>min</th>
                <th>hour</th>
                <th>day</th>
                <th>day_week</th>
                <th>month</th>
                <th>last_run</th>
                <th>next_run</th>
                <th>status</th>
                <th>action</th>
            </tr>
            ${content}
            <tr>
                <td><input type="text" id="input_cron_class" placeholder="class" style="width: 200px;"></td>
                <td><input type="text" id="input_cron_min" placeholder="min" value="0" style="width: 40px;"></td>
                <td><input type="text" id="input_cron_hour" placeholder="hour" value="0" style="width: 40px;"></td>
                <td><input type="text" id="input_cron_day" placeholder="day" value="0" style="width: 40px;"></td>
                <td><input type="text" id="input_cron_day_week" placeholder="day_week" value="0" style="width: 40px;"></td>
                <td><input type="text" id="input_cron_month" placeholder="month" value="0" style="width: 40px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="button" class="btn-small btn-success" id="btn_cron_add">Add</button></td>
            </tr>    
        </table>
    </div>
</div>
