/* Floatbox 5.1.0 */
(function(q,w,o,x){var f='en',r='Internet Explorer 6 - End of Life',s='We notice that you are using Internet Explorer version 6.0. Please be advised that this site and many others will have reduced functionality under this very old browser. There are also security risks involved in continuing to use IE6. To make your browsing experience safer and better, and to help web site developers everywhere, please replace your browser with one of the choices available below.',t='Do not show this again (requires a permanent cookie)',c='#fbBox a.fb{zoom:1}',m='selectorText',h='ie6Styles',n=fb.data.ZZ,a=n&&n.fb.data;if(!a&&a.X)return;function u(d){var i='ie6_'+d+'_css',g=n.document;if(!a[i]){if(!a[h]){var e=o,b=g.styleSheets.length,j,k,p,l;while(b--){k=g.styleSheets[b];for(j=0;j<k.rules.length;j++){if(k.rules[j][m].indexOf('DIV#fbBox')>-1){e=k;b=0;break}}}if(!e)return;a[h]={black:c,white:c,blue:c,yellow:c,red:c,custom:c};for(b=0;b<e.rules.length;b++){l=e.rules[b];if((p=/\.fb_(black|white|blue|yellow|red|custom)/.exec(l[m]))){a[h][p[1]]+=l[m]+'{'+l.style.cssText+'}'}}}a[i]=g.createStyleSheet();a[i].cssText=a[h][d].replace(/url\(graphics\//gi,'url('+a.UT).replace(/\.png/g,'.gif')}}function v(i){if(fb.ieVersion===6&&a.Y.YW.showIE6EndOfLife&&self===top&&!a.ZO){if(!/fbIE6Shown=.+/.test(document.cookie)){f=/bg|cs|da|de|el|es|et|fi|fr|hr|hu|it|nl|pl|pt|ro|sk|sl|sv/.test(f)?f:'en';var g='http://www.browserchoice.eu/BrowserChoice/browserchoice_'+f+'.htm',e=/bg|de|el/.test(f)?446:410;fb.start('<div style="padding:10px 20px 0 20px; color:black;"><span style="font-size:20px; font-weight:bold;">'+r+'</span><span><br/>'+s+'</span></div><iframe src="'+g+'" width="816" height="'+e+'" frameborder="0" scrolling="no"></iframe>',{width:816,enableDragResize:false,controlsPos:'tr',backgroundColor:'#DAF3FD',caption:'<input type="checkbox" id="fbIE6check"/><span id="fbIE6noshow">'+t+'</span>',afterItemStart:function(){document.cookie='fbIE6Shown=true; path=/'},beforeItemEnd:function(){if(fb.$('fbIE6check').checked){var d=new Date;d.setTime(d.getTime()+75*24*60*60*1000);document.cookie='fbIE6Shown=true; expires='+d.toGMTString()+'; path=/'}}})}}a.M.ie6.ZC=o}fb.extend(a.M.ie6,{X:q,ZC:v,R2:u})})(true,false,null);