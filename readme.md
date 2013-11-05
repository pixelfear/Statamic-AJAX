# AJAX for Statamic

Lets you use conditionals for whether the page was requested via AJAX or not.

### In your layout...  
Show wrapping code if it's a regular request.

    {{ unless {ajax} }}
    <html>
    <body>
    {{ endif }}
      {{ layout_content }}
    {{ unless {ajax} }}
    </body>
    </html>
    {{ endif }}

### In your template...
Output JSON for AJAX requests and HTML for normal requests.  
There's also an `{{ ajax:json_encode }}` tag pair that will take care of line breaks, escaping quotes, etc.

    {{ if {ajax} }}
      [
      {{ entries:listing }}
        {
          "title": {{ ajax:json_encode }}{{ title }}{{ /ajax:json_encode }}
        }{{ unless last }},{{ endif }}
      {{ /entries:listing }}
      ]
    {{ else }}
      <ul>
	  {{ entries:listing }}
	    <li>{{ title }}</li>
	  {{ /entries:listing }}
	  </ul>
    {{ endif }}