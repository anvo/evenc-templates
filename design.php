<?

define('PATH','./html/');



/*******************************************************************************
* ############################################################################ *
*******************************************************************************/
$templates = get_templates();
if(isset($_POST['template']) && in_array($_POST['template'],$templates))
    $template_name = $_POST['template'];
else
    $template_name = current($templates);
display_template($template_name);

/*******************************************************************************
* ############################################################################ *
*******************************************************************************/
function display_template($name)
{
    //files
    $template['content_files'] = array(
                                'message_box.html',
                                'day.html',
                                'event.html',
                                'event_form.html',
                                'search.html'
                                );


    //content
    $content['CALENDAR']    = file_get_contents(PATH.$name.'/calendar.html');
    $content['NAVI']        = file_get_contents(PATH.$name.'/navi.html');
    $content['CONTENT']    = create_template_selection(get_templates());
    foreach($template['content_files'] AS $key => $val)
    {
        $content['CONTENT'] .= file_get_contents(PATH.$name.'/'.$val);
    }

    $content['CALENDAR_DAYS']        = ''; for($i=0;$i<4;$i++){$content['CALENDAR_DAYS'].='<tr>';for($j=1;$j<=7;$j++)$content['CALENDAR_DAYS'].='<td><a href="">'.((7*$i)+$j).'</a></td>';$content['CALENDAR_DAYS'].='</tr>';}

    //forms
    $content['COMMENT_FORM']        = file_get_contents(PATH.$name.'/comment_form.html');
    $content['SEARCH_FORM']         = file_get_contents(PATH.$name.'/search_form.html');

    //list
    $content['EVENTS']              = '[_c_EVENT_] [_c_EVENT_]';
    $content['COMMENTS']            = '[_c_COMMENT_] [_c_COMMENT_]';

    //static
    // message
    $content['MESSAGE_TYPE']    = 'Message';
    $content['MESSAGE_TEXT']    = 'Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est';

    // event
    $content['EVENT']           = file_get_contents(PATH.$name.'/event_box.html');
    $content['EVENT_ID']          = 0;
    $content['EVENT_NAME']        = 'Testevent';
    $content['EVENT_TIME']        = '00:00';
    $content['EVENT_LOCATION']    = 'Location';
    $content['EVENT_TEXT']        = "<span class='bbc_strike'>strike</span>
                                    <span class='bbc_italic'>italic</span>
                                    <span class='bbc_underline'>underline</span>
                                    <span class='bbc_bold'>bold</span>
                                    <span style='color: Green;'>green</span>
                                    <a href='http://www.evenc.net'>evenc.net</a>
                                    Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos";
    $content['EVENT_STARTDATE'] = date('Y-m-d');
    $content['EVENT_ENDDATE']   = $content['EVENT_STARTDATE'];
    $content['EVENT_RECURRENCE_NONE']   = 'checked="checked"';
    $content['EVENT_RECURRENCE_DAY']    = '';
    $content['EVENT_RECURRENCE_WEEK']   = '';
    $content['EVENT_RECURRENCE_MONTH']  = '';
    $content['EVENT_RECURRENCE_YEAR']   = '';
    $content['EVENT_PERIOD_FOREVER']    = 'checked="checked"';
    $content['EVENT_PERIOD_UNTIL']      = '';
    $content['EVENT_PERIOD_TIMES']      = '';
    $content['EVENT_URL']       = '.';
    $content['EVENT_URL_ICAL']  = '.';

    // comment
    $content['COMMENT']         = file_get_contents(PATH.$name.'/comment_box.html');
    $content['COMMENT_NAME']    = 'Toni Tester';
    $content['COMMENT_EMAIL']   = 'toni@tester.test';
    $content['COMMENT_TIME']    = '21:00';
    $content['COMMENT_DATE']    = date('Y-m-d');
    $content['COMMENT_TEXT']    = "Et harum quidem rerum facilis est et expedita distinctio.<blockquote class='bbc_quote' cite='Toni Tester'><p>Et harum quidem rerum facilis est et expedita distinctio.</p></blockquote><ul class='bbc_list'><li>1</li><li>2</li></ul>
                                    <code class='bbc_code'>&lt;?
        phpinfo();
    ?&gt;</code>";
    $content['COMMENT_EVENT_ID'] = '0';

    $content['URL_RSS']         = '.';
    $content['URL_RSS_DATE']    = '.';
    $content['URL_FORM_EVENT']  = '.';
    $content['URL_FORM_COMMENT'] = '.';
    $content['URL_FORM_SEARCH'] = '.';
    $content['URL_SEARCH']      = '.';
    $content['URL_EVENT_ADD']   = '.';
    $content['CALENDAR_URL_YEAR_PREV']  = '.';
    $content['CALENDAR_URL_YEAR_NEXT']  = '.';
    $content['CALENDAR_URL_MONTH_PREV'] = '.';
    $content['CALENDAR_URL_MONTH_NEXT'] = '.';

    $content['DAY']         = '02';
    $content['MONTH']       = '02';
    $content['YEAR']        = date('Y');
    $content['VERSION']     = 'Theme Kit';
    $content['URL_BASE']    = '.';
    $content['SUBJECT']     = 'Theme Kit';
    $content['COPYRIGHT']   = "<a href='http://www.evenc.net'>evenc</a> (c) 2005-2010 <a href='http://andreasvolk.de'>Andreas Volk</a>";

    //lang
    $lang['DAYMO'] = 'Mo';
    $lang['DAYTU'] = 'Tu';
    $lang['DAYWE'] = 'We';
    $lang['DAYTH'] = 'Th';
    $lang['DAYFR'] = 'Fr';
    $lang['DAYSA'] = 'Sa';
    $lang['DAYSU'] = 'Su';
    $lang['EVENT_ADD'] = 'event add';
    $lang['SEARCH_STRING'] = 'search string';
    $lang['RSS_ALL'] = 'rss all';

    $lang['COMMENT_WROTE']      = 'comment wrote';
    $lang['COMMENT_ADD']        = 'comment add';
    $lang['COMMENT_NAME']       = 'comment name';
    $lang['COMMENT_NAME_NOTE']  = 'comment name note';
    $lang['COMMENT_EMAIL']      = 'comment email';
    $lang['COMMENT_EMAIL_NOTE'] = 'comment email note';
    $lang['COMMENT_TEXT']       = 'comment text';
    $lang['COMMENT_TEXT_NOTE']  = 'comment text note';

    $lang['EVENT_DATE']         = 'event date';
    $lang['EVENT_DATE_NOTE']    = 'event date note';
    $lang['EVENT_TIME']         = 'event time';
    $lang['EVENT_TIME_NOTE']    = 'event time note';
    $lang['EVENT_NAME']         = 'event name';
    $lang['EVENT_NAME_NOTE']    = 'event name note';
    $lang['EVENT_LOCATION']         = 'event location';
    $lang['EVENT_LOCATION_NOTE']    = 'event location note';
    $lang['EVENT_TEXT']             = 'event text';
    $lang['EVENT_TEXT_NOTE']        = 'event text note';
    $lang['EVENT_RECURRENCE']       = 'event recurrence';
    $lang['EVENT_RECURRENCE_NONE']  = 'none';
    $lang['EVENT_RECURRENCE_DAY']   = 'day';
    $lang['EVENT_RECURRENCE_WEEK']  = 'week';
    $lang['EVENT_RECURRENCE_MONTH'] = 'month';
    $lang['EVENT_RECURRENCE_YEAR']  = 'year';
    $lang['EVENT_PERIOD']           = 'period';
    $lang['EVENT_PERIOD_FOREVER']   = 'forever';
    $lang['EVENT_PERIOD_UNTIL']     = 'until';
    $lang['EVENT_PERIOD_TIMES']     = 'times';

    //parse
    $index = file_get_contents(PATH.$name.'/index.html');

    $search = array();
    $replace = array();
    foreach($content AS $key => $val)
    {
        $search[] = '[_c_'.$key.'_]';
        $replace[] = $val;
    }
    foreach($lang AS $key => $val)
    {
        $search[] = '[_l_'.$key.'_]';
        $replace[] = $val;
    }
    $index = str_replace($search, $replace, $index);

    echo $index;
}

/**
 * @return array
*/
function get_templates()
{
    $remove = array('.', '..','.svn');
    $retval = scandir(PATH);
    foreach($retval AS $key => $val)
    {
        if(in_array($val,$remove))
            unset($retval[$key]);
    }
    return $retval;
}
/**
 * @param templates array
*/
function create_template_selection($templates)
{

    $retval = '
    <form class="templates" action="./design.php" method="post" style="text-align: center;">
        <div>
            <label for="template">Template</label>
            <select id="template" name="template">';
    if(is_array($templates))
    {
        foreach($templates AS $key => $val)
        {
            $retval .= '<option value="'.$val.'">'.$val.'</option>';
        }
    }
    $retval .= '</select>
        <input type="submit" />
        </div>
    </form>
    ';
    return $retval;
}


?>
