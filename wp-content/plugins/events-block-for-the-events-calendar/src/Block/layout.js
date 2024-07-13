import {Fragment} from "@wordpress/element";
const {__} = wp.i18n




const Layout = (props) => {
   
   let FontFamily = props.title_family_font+"|"+props.venue_family_font+"|"+props.description_family_font+"|"+props.date_family_font+"|"+props.link_family_font
   let title_link = document.createElement('link')
   title_link.href = 'https://fonts.googleapis.com/css?family='+FontFamily
   title_link.rel = "stylesheet";
   title_link.type =  "text/css";
   document.head.appendChild(title_link);

   let event_type = props.feature == false ? 'ebec-simple-event' : 'ebec-featured-event';
   let event_time ="";
   let date_start = new Date(props.start_date); 
   let date_end = new Date(props.end_date); 
   let longMonthStart =date_start.toLocaleString('en-us', { month: 'long' })
   let shortMonthStart = date_start.toLocaleString('en-us', { month: 'short' })
   let longDayStart=date_start.toLocaleDateString( 'en-us',{ weekday: 'long' })
   let longMonthEnd =date_start.toLocaleString('en-us', { month: 'long' })
   let start_time = date_start.toLocaleString('en-us', { hour: 'numeric',minute: 'numeric', hour12: true })
   let end_time = date_end.toLocaleString('en-us', { hour: 'numeric',minute: 'numeric', hour12: true })
   let date_style = "";
   if(date_end && date_start){
      if(props.start_date_day == props.end_date_day && longMonthStart==longMonthEnd ){
         event_time=<span>{start_time}-{end_time}</span>
      }else{
         event_time=<span>{props.start_date_day} {longMonthStart}-{props.end_date_day} {longMonthEnd}</span>
      }
   }
   if(props.date_format != null){
      if(props.date_format == "DM" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-day" style={{fontSize:25+props.date_font+'px'}}> {props.start_date_day} </span>
         <span className="ebec-ev-month" style={{fontSize:16+props.date_font+'px'}}>{shortMonthStart}</span>
         </div>
      }
      else if(props.date_format == "MD" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date}>
         <span className="ebec-ev-month" >{shortMonthStart} </span>
         <span className="ebec-ev-day"> {props.start_date_day}</span>
         </div>
      }
      else if(props.date_format == "FD" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date}>
         <span className="ebec-ev-month">{longMonthStart} </span>
         <span className="ebec-ev-day"> {props.start_date_day}</span>
         </div>
      }
      else if(props.date_format == "DF" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date}>
         <span className="ebec-ev-day"> {props.start_date_day} </span>
         <span className="ebec-ev-month">{longMonthStart}</span>
         </div>
      }
      else if(props.date_format == "FD,Y" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-month">{longMonthStart}</span>
         <span className="ebec-ev-day"> {props.start_date_day}, </span>
         <span className="ebec-ev-yr">{props.start_date_year}</span>
         </div>
      }
      else if(props.date_format == "MD,Y" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-month">{shortMonthStart}</span>
         <span className="ebec-ev-day"> {props.start_date_day}, </span>
         <span className="ebec-ev-yr">{props.start_date_year}</span>
         </div>
      }
      else if(props.date_format == "MD,YT" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date}>
         <span className="ebec-ev-month">{shortMonthStart}</span>
         <span className="ebec-ev-day"> {props.start_date_day}, </span>
         <span className="ebec-ev-yr">{props.start_date_year}</span>
         <span className="ebec-ev-time"><span class="ebec-icon"><i class="ebec-icon-clock" aria-hidden="true"></i></span>{event_time}</span>
         </div>
      }
      else if(props.date_format == "jMl" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-day"> {props.start_date_day} </span>
         <span className="ebec-ev-month">{longMonthStart} </span>
         <span className="ebec-ev-weekday">{longDayStart}</span>
         </div>
      }
      else if(props.date_format == "full" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date}>
         <span className="ebec-ev-day"> {props.start_date_day} </span>
         <span className="ebec-ev-month">{longMonthStart} </span>
         <span className="ebec-ev-yr">{props.start_date_year}</span>
         <span className="ebec-ev-time"><span class="ebec-icon"><i class="ebec-icon-clock" aria-hidden="true"></i></span>{event_time}</span>
         </div>
      }
      else if(props.date_format == "d.FY" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-day"> {props.start_date_day}.</span>
         <span className="ebec-ev-month">{longMonthStart}</span>
         <span className="ebec-ev-yr">{props.start_date_year}</span>
         </div>
      }
      else if(props.date_format == "d.F" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date}>
         <span className="ebec-ev-day"> {props.start_date_day}.</span>
         <span className="ebec-ev-month">{longMonthStart}</span>
         </div>
      }
      else if(props.date_format == "d.Ml" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-day"> {props.start_date_day}. </span>
         <span className="ebec-ev-month">{shortMonthStart} </span>
         <span className="ebec-ev-weekday">{longDayStart}</span>
         </div>
      }
      else if(props.date_format == "ldF" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-weekday">{longDayStart} </span>
         <span className="ebec-ev-day"> {props.start_date_day} </span>
         <span className="ebec-ev-month">{longMonthStart}</span>
         </div>
      }
      else if(props.date_format == "Mdl" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-month">{shortMonthStart} </span>
         <span className="ebec-ev-day"> {props.start_date_day}, </span>
         <span className="ebec-ev-weekday">{longDayStart}</span>
         </div>
      }
      else if(props.date_format == "dFT" ){
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
            <span className="ebec-ev-day"> {props.start_date_day} </span>
         <span className="ebec-ev-month">{longMonthStart} </span>
         <span className="ebec-ev-yr">{props.start_date_year}</span>
         <span className="ebec-ev-time"><span class="ebec-icon"><i class="ebec-icon-clock" aria-hidden="true"></i></span>{event_time}</span>
         </div>
      }
      else{
         date_style = <div className="ebec-date-area default-schedule" itemprop="startDate" content={props.start_date} >
         <span className="ebec-ev-day"> {props.start_date_day} </span>
         <span className="ebec-ev-month">{longMonthStart} </span>
         <span className="ebec-ev-yr">{props.start_date_year}</span>
         </div>
      }
   } 
   return(
        <Fragment>
        { props.display_header === true &&
        <div className={'ebec-month-header ' +event_type+''}><span className="ebec-header-year">{longMonthStart} {props.start_date_year}</span><span className="ebec-header-line"></span></div>}
        <div id={"event-"+props.id+""} className={"ebec-list-posts style-1 "+event_type+""}>
          <div className="ebec-event-date-tag"><div className="ebec-event-datetimes">
            <span className="ev-mo">{shortMonthStart}</span>
            <span className="ebec-ev-day" >{props.start_date_day}</span>
          </div></div>
          <div className="ebec-event-details">
            <div className="ebec-event-datetime">
              <span className="ebec-minimal-list-time">
                  {date_style}
                <meta itemprop="endDate" content={props.end_date}></meta>
              </span>
            </div>
            <a href={props.url}  className={'ebec-events-title'}>{props.title}</a>
            { props.hide_venue == "no" && props.venue.length !== 0 &&
            <div className="ebec-list-venue">
              <span className="ebec-icon"><i className="ebec-icon-location" aria-hidden="true"></i></span>
              <a href={props.venue_url} title="Kiehn">{props.venue_name}</a>
              ,
              {props.venue_address != undefined ?
              <span className="tribe-address">
               <span className="tribe-street-address">{props.venue_address}</span>
            <br></br>
               <span className="tribe-locality">{props.venue_city}</span><span className="tribe-delimiter">,</span>
               <abbr className="tribe-region tribe-events-abbr" title="">{props.venue_state} </abbr>
               <span className="tribe-country-name">{props.venue_country}</span>
               </span>
               :null}
            </div>
            }
            { props.display_description == "yes" && props.display_description !== "" &&
            <div className="ebec-minimal-list-desc"> 
               <div className="ebec-event-content" itemprop="description" content={props.description}><p dangerouslySetInnerHTML={{__html: props.description}} />
              </div>
            </div>
            }
            {props.event_cost != null &&
            <div className="ebec-list-cost" style={{color:props.main_col}}><div dangerouslySetInnerHTML={{__html:props.event_cost}}></div></div>
            }
            <div className="ebec-style-1-more"><a href={props.url} className="ebec-events-read-more" rel="bookmark" >{props.link_name}</a></div>
        </div>
        <div className="ebec-right-wrapper">
        {props.image_url != undefined &&
          <a className="ebec-static-small-list-ev-img" href={props.url}>
          <img src={props.image_url}></img><span className="image-overlay overlay-type-extern"><span className="image-overlay-inside"></span></span>
          </a>
        }
        </div>
      </div>
        </Fragment>
    )
}
export default Layout