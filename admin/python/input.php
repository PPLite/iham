<html>

<head>
<meta charset="utf-8">
<title>Brython demo</title>
<style>
body{
    font-size: 14px;
    font-family: Helvetica;
}

a{
    color: #333;
}

a.menu{
    text-decoration: none;
}

a.menu:hover{
    background-color: #ccc;
}

a.selected{
    font-weight: bold;
}

a:visited{
    color: #333;
}

li{
    list-style-type: none;
}

#panel{
    display:table-cell;
    width:65%;
    padding-right:2%;
    text-align: left;
}

button{
    background-color: #dadada;
    color: #113;
    border-style: solid;
    border-color: #000;
    border-width: 1px;
    border-radius: 3px;
    font-size: 1.2em;
}
button.btn-ls{
    font-size: 1em;
}

div.example{
    margin-top: 2em;
    display: none;
}

pre{
    display: inline-block;
    padding: 1em;
    font-family: Consolas, Courier New;
    color: #ff9;
    background-color: #114;
    border-radius: 10px;
    margin-top: 2em;
    width: 66%;
}

pre.html{
    padding: 0.5em;
}

.zone{
    margin-left: 5em;
    padding: 1em;
    border-width: 1px;
    border-color: #333;
    border-style: solid;
    width: 20em;
}

code{
    font-family: Consolas, Courier New;
    color: #113;
    padding-left: 0.2em;
    padding-right: 0.2em;
}

code.file{
    background-color: #fff;
    font-weigth: bold;
    font-style: italic;
}

#moving{
    position: relative;
    left:140px;
    top:10px;
    font-size:16px;
    padding: 3px;
    background-color: var(--clear-2);
    border-radius: 4px;
}

.up{
    font-size: 1.2em;
}
.down{
    font-size:0.8em;
}

/* colors for highlighted Python code */

span.python-string{
    color: #6aa;
}
span.python-comment{
    color: #6a6;
}
span.python-keyword{
    color: #42ebf4;
}
span.python-builtin{
    color: #0f0;
}
</style>

</head>

<body onload="brython({debug: 1, indexedDB: false})">

<h1 style="text-align: center">Introduction to <a href="http://brython.info" target="_blank" class="external">Brython</a></h1>
<div style="display:table; width:100%;">
  <div style="display: table-row">
    <div style="display: table-cell; width:20%; vertical-align: top;">
      <ul id="menu">
      </ul>
    </div>
    <div style="" id="panel">
      <div id="home">
        <p>This page shows a few examples of how you can interact with a web
        page using Python as the scripting language : create new elements,
        access and modify existing elements, create graphics, animations, send
        Ajax requests, etc.
        <p>The scripts use objects - elements shown in the page, styles
        applied to these elements, events, etc. - that are described in the
        Document Object Model (DOM), defined by the W3C. The reference used in
        this page is the
        <a href="https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model" target="_blank" class="external">Mozilla Developer Network</a>
        (MDN) documentation.
        <p>Although the DOM is by nature language-independant, most examples
        in the MDN documentation are written with Javascript, not
        (yet&nbsp;;-) in Python. The translation is usually straightforward,
        since Brython supports all the DOM types and their attributes and methods.
        <p>In some cases, Brython adds a more Pythonic syntax : you will discover
        them by browsing the examples.
        <p>More documentation and examples can be found on the
        <a href="http://brython.info" target="_blank" class="external">Brython site</a>.
      </div>
    </div>
  </div>
</div>


<div class="example" id="ex0">
    <button id="button_alert">display an alert box</button>

    <script type="text/python" id="script0">
    from browser import document, alert

    def hello(ev):
        alert("Hello !")

    document["button_alert"].bind("click", hello)
    </script>

    <p>
    <pre class="python"></pre>

    <p><span class="comment">
    <code>browser</code> is a Brython-specific module that defines the objects
    used to interact with the page.
    <p><code>document</code> is an object representing the HTML document ;
    <code>document[element_id]</code> is the element with attribute id equal
    to element_id. In this example, <code>document["button0"]</code> is a
    reference to the button you click on.
    <p><code>bind(<i>event, function</i>)</code> is a method of elements that
    takes two arguments, the name of an event and the function to call when
    the event occurs on the element. When the user clicks on the element, this
    event is called "click". The code means : when the user clicks on the
    element (here, the button with the text "display an alert box"), call the
    function <code>hello</code>.
    The function takes one argument, an object representing the event.
    <p><code>alert</code> is used to display small popup windows.
    </span>
</div>

<div class="example" id="ex_dialog">
    <button id="button_dialog">display a popup window</button>

    <script type="text/python" id="script_dailog">
    from browser import document
    from browser.widgets.dialog import InfoDialog

    def hello(ev):
        InfoDialog("Demo", "Hello world !", left=ev.x, top=ev.y)

    document["button_dialog"].bind("click", hello)
    </script>

    <p>
    <pre class="python"></pre>

    <p><span class="comment">
    Instead of the browser alert box, you can use a dialog box provided
    by the built-in module <code class="module">browser.widgets.dialog</code>.
    <p>Here, the box is positioned at the mouse position (given by the attributes
    <code>x</code> and <code>y</code> of the event object) by keyword arguments
    <code>left</code> and <code>top</code>.
    </span>
</div>

<div class="example" id="ex1">
    <button id="button1">change the text of an element</button>
    <span id="zone1" class="zone">Initial content</span>

    <script type="text/python" id="script1">
    from browser import document

    def change(event):
        document["zone1"].textContent = "New content"

    document["button1"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    The attributes and methods of the elements are described in the Document
    Object Model (DOM), which is abundantly documented (by
    <a href="https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model" class="external">Mozilla</a>
    for instance).
    <p><code>textContent</code> is an attribute of
    <a href="https://developer.mozilla.org/en-US/docs/Web/API/Node" target="_blank" class="external">Node</a> instances ; it is used to get or set an element's text content.
    <p>Brython supports all the DOM methods and attributes ; for text content
    it provides a shortcut, <code>text</code>, so that the function body can
    also be written :
    <pre class="python">
    def change(event):
        document["zone1"].text = "New Content"
    </pre>
</code>
</span>
</div>

<div class="example" id="ex2">
    <button id="button2">change the style of an element</button>
    <span id="zone2" style="color:blue;background-color:#aad;" class="zone">coloured content</span>

    <script type="text/python" id="script2">
    from browser import document

    element = document["zone2"]

    def change(event):
        style = element.style
        color = style.color
        style.color = "#cc8" if color == "blue" else "blue"
        style.backgroundColor = "gray" if color == "blue" else "#aad"
        style.fontWeight = "bold" if color == "blue" else "normal"
        style.fontSize = "18px" if color == "blue" else "14px"

    document["button2"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    Elements have an attribute <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/style" target="_blank"><code>style</code></a>, which itself has (among many others) the attributes <code>color</code> (text color), <code>backgroundColor</code> (background color), <code>fontWeight</code> ("bold" or "normal"), <code>fontSize</code> (size of the letters, in pixels), etc.
    <p>Look <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/Reference" target="_blank" class="external">here</a> for a reference on CSS.
    <p>Note that the attribute names that have a hyphen is CSS are written in camelCase in Python code : for instance, to set the CSS attribute <code>background-color</code>, the syntax is <code>style.backgroundColor</code>
    </span>

</div>

<div class="example" id="ex_class">
    <button id="button_class">change the class of an element</button>
    <span id="zone_class" style="color:blue;background-color:#aad;" class="zone">a random text</span>

    <script type="text/python" id="script_class">
    from browser import document

    element = document["zone_class"]
    element.classList.add("down")

    def change_class(event):
        if "up" in element.classList:
            element.classList.remove("up")
            element.classList.add("down")
        else:
            element.classList.remove("down")
            element.classList.add("up")

    document["button_class"].bind("click", change_class)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    Elements have an attribute <a href="https://developer.mozilla.org/en-US/docs/Web/API/Element/classList" target="_blank" class="external"><code>classList</code></a> with the values set in the attribute <code>class</code> of the element.
    <p>It is an instance of the class <a href="https://developer.mozilla.org/en-US/docs/Web/API/DOMTokenList" target="_blank" class="external"><code>DOMTokenList</code></a>, which supports the methods <code>add()</code> and <code>remove()</code>.
    </span>

</div>


<div class="example" id="ex3">
    <button id="button3">hide or show an element</button>
    <span id="zone3" class="zone">on / off</span>

    <script type="text/python"  id="script3">
    from browser import bind, document

    @bind("#button3", "click")
    def change(event):
        display = document["zone3"].style.display
        document["zone3"].style.display = "inline" if display == "none" else "none"

    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    <code>display</code> is another attribute of <code>style</code>. Setting it to <code>"none"</code> hides the element.
    <p>Note that in this example, we use a variant of the syntax to bind
    events to functions. Instead of the form we had seen before, which uses
    the <i>method</i> <code>bind</code> of DOM elements, here we use the
    <i>function</i> bind defined in module <code>browser</code>. It is used
    as a decorator for the callback function, and takes two parameters:
    <ul>
    <li>- an identifier of the element(s) to bind : either a reference to the
    element, or a <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors"
    class="external">CSS selector</a> (here, the selector "#button3" refers to the
    button)
    <li>- the event name
    </ul>
    </span>
</div>

<div class="example" id="ex6_std">
    <button id="button6_std">insert an element (standard DOM methods)</button>
    <span id="zone6_std" class="zone">initial content</span>

    <script type="text/python" id="script6_std">
    from browser import document, html

    element = document.getElementById("zone6_std")
    nb = 0

    def change(event):
        global nb
        elt = document.createElement("B")
        txt = document.createTextNode(f" {nb}")
        elt.appendChild(txt)
        element.appendChild(elt)
        nb += 1

    document["button6_std"].addEventListener("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">This example uses the standard DOM methods to create elements (<a href="https://developer.mozilla.org/en-US/docs/Web/API/Document/createElement" target="_blank" class="external"><code>document.createElement()</code></a>, <a href="https://developer.mozilla.org/en-US/docs/Web/API/Document/createTextNode" target="_blank" class="external"><code>createTextNode()</code></a>) and append them to other elements or to the document (<a href="https://developer.mozilla.org/en-US/docs/Web/API/Node/appendChild" target="_blank"><code>Node.appendChild()</code></a>).
    <p>Note that on the last line, we use the standard DOM method <a href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener" target="_blank" class="external"><code>EventTarget.addEventListener()</code></a> : the method <code>bind()</code> used in the other examples is Brython-specific.
    <p>Also note the use of f-string for string formatting (<a href="https://www.python.org/dev/peps/pep-0498/" target="_blank" class="external">PEP 448</a>, introduced in Python 3.6) in the line
    <pre class="python">

        txt = document.createTextNode(f" {nb}")
    </pre>
    </span>

</div>

<div class="example" id="ex6">
    <button id="button6">insert an element (Brython style)</button>
    <span id="zone6" class="zone">initial content</span>

    <script type="text/python" id="script6">
    from browser import document, html

    element = document["zone6"]
    nb = 0

    def change(event):
        global nb
        element <= html.B(f" {nb}")
        nb += 1

    document["button6"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    To create DOM elements, Brython provides the module <code class="module">browser.html</code>. It defines classes with the name of all the valid HTML tags in uppercase ; <code>html.B("message")</code> creates the element <code class="html">&lt;B&gt;message&lt;/B&gt;</code>
    <p>To include an element inside another one, Brython uses the operator <code><=</code> : think of it as a left arrow, not as "less than or equal". The use of an operator is more concise and avoids having to use a function call.
    </code>
    </span>

</div>

<div class="example" id="ex61">
    <button id="button61">insert before an element</button>
    <div id="zone61" class="zone"><ul><li>element</ul></div>

    <script type="text/python" id="script61">
    from browser import document, html

    ul = document["zone61"].get(selector="ul")[0]
    element = ul.get(selector="li")[0]
    nb = 0

    def change(event):
        global nb
        nb += 1
        ul.insertBefore(html.LI(f"element before {nb}"), element)

    document["button61"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    We use the standard DOM method <a href="https://developer.mozilla.org/en-US/docs/Web/API/Node/insertBefore" class="external">insertBefore()</a>
    </code>
    </span>

</div>

<div class="example" id="ex62">
    <button id="button62">insert after an element</button>
    <div id="zone62" class="zone"><ul><li>element</ul></div>

    <script type="text/python" id="script62">
    from browser import document, html

    ul = document["zone62"].get(selector="ul")[0]
    element = ul.get(selector="li")[0]
    nb = 0

    def change(event):
        global nb
        nb += 1
        ul.insertBefore(html.LI(f"element after {nb}"), element.nextSibling)

    document["button62"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    We use the standard DOM method <a href="https://developer.mozilla.org/en-US/docs/Web/API/Node/insertBefore" class="external">insertBefore()</a>
and insert the element after <a href="https://developer.mozilla.org/en-US/docs/Web/API/Node/nextSibling" class="external">element.nextSibling</a>.
If the element is the last in its parent's children, <code>nextSibling</code> is <code>null</code> so the new element is inserted at
the end.
    </code>
    </span>

</div>


<div class="example" id="ex_elt_attr">
    <button id="button_elt_attr">insert an element with attributes</button>
    <span id="zone_elt_attr" class="zone">initial content</span>

    <script type="text/python" id="script_elt_attr">
    from browser import document, html

    element = document["zone_elt_attr"]

    def insert(event):
        element <= html.SPAN("new text",
            style=dict(color="red", paddingLeft="1em"),
            Class="down")

    document["button_elt_attr"].bind("click", insert)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    The attributes of a tag are defined as keyword arguments of the html classes constructor.
    <p>Note that the style attribute is passed as a dictionary ; also note that, since <code>class</code> is a Python keyword, it can't be used as a key, so we use <code>Class</code> instead (tag attributes are case-insensitive).
    </code>
    </span>

</div>


<div class="example" id="ex7">
    <button id="button7">insert an HTML table</button>
    <p>
    <div id="zone7" class="zone" style="width:60%"></div>

    <script type="text/python" id="script7">
    from browser import document
    from browser.html import TABLE, TR, TH, TD

    def insert_table(event):
        table = TABLE()

        # header row
        table <= TR(TH(f"Column {i}") for i in range(5))

        # table rows
        for row in range(3):
            table <= TR(TD(f"Cell {row}-{i}") for i in range(5))

        document["zone7"].clear()
        document["zone7"] <= table

    document["button7"].bind("click", insert_table)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    To build a table, we use the HTML tags <code>TABLE, TR, TH</code> and <code>TD</code>.
    <p>The first attribute passed to the classes defined in <code class="module">browser.html</code> is either a string, another instance of a class, <i>or an iterator on such elements</i>.
    <p>Here we use a Python generator expression to include several headers (<code>TH</code>) in the first row (<code>TR</code>) of the table, and the same for the table cells (<code>TD</code>) in the next rows.
    <p><code>clear()</code> is a method that removes all the element contents.
    </code>
    </span>

</div>


<div class="example" id="ex12">
    <button id="button12">insert a dropdown menu</button>
    <span id="zone12" class="zone"></span>

    <script type="text/python" id="script12">
    from browser import document, html
    from browser.widgets.dialog import InfoDialog

    def show(event):
        dropdown = event.target
        num = dropdown.selectedIndex
        InfoDialog("Demo", "Selected: {}".format(dropdown.options[num].value))

    def insert_dropdown(event):
        document["zone12"] <= "Your choice : "
        dropdown = html.SELECT(html.OPTION(f"Choice {i}") for i in range(5))
        dropdown.bind("change", show)
        document["zone12"] <= dropdown

    document["button12"].bind("click", insert_dropdown)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    We build the dropdown menu by a SELECT element, using a generator expression with the OPTION elements displayed in the menu.
    <p>When the user changes the selected option in the menu, the event "change" is triggered on the SELECT box. This is done in the line

    <p>
    <pre class="python">
    dropdown.bind("change", show)
    </pre>
    <p>

    <p>In function <code>show(event)</code>, <code>event.target</code> is the element itself.
    <p>A <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLSelectElement" target="_blank">SELECT element</a> has an attribute <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLSelectElement/selectedIndex" target="_blank"><code>selectedIndex</code></a>, the rank of the selected item in the list of options, available by its attribute <code>options</code>. The OPTION element itself has an attribute <code>value</code>, here the option text.
    </span>
</div>


<div class="example" id="ex8">
    <button id="button8">draw in a canvas</button>
    <canvas id="zone8" width="200" height="50"
        style="border-color:#000;border-style:solid;border-width:1px;margin-left:5em;"></canvas>

    <script type="text/python" id="script8">
    from browser import document, html
    import math

    canvas = document["zone8"]
    ctx = canvas.getContext("2d")

    x = 20

    def draw(event):
        global x
        ctx.beginPath()
        ctx.arc(x, 25, 15, 0, 2 * math.pi)
        x += 15
        ctx.stroke()

    document["button8"].bind("click", draw)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    We start by importing the module <code class="module">math</code>, the same as in the Python standard distribution.
    <p><a href="https://developer.mozilla.org/en-US/docs/Web/API/Canvas_API" target="_blank">Canvas</a> is an API for drawing geometric forms in the page. The examples on the MDN pages are written in Javascript but can be easily translated for Brython.
    </span>
</div>

<div class="example" id="ex9">
    <button id="button9">insert an image</button>
    <p><div id="zone9" class="zone" style="height:60px;"></div>

    <script type="text/python"  id="script9">
    from browser import document, html

    logo = "https://www.python.org/static/community_logos/python-logo-master-v3-TM.png"

    def insert_image(event):
        document["zone9"].clear()
        document["zone9"] <= html.IMG(src=logo, height=50)

    document["button9"].bind("click", insert_image)
    </script>
</div>

<div class="example" id="ex16">
    <button id="button16">get the value of form fields</button>
    <p><div id="zone16" class="zone"></div>

    <p><div style="width:30%; padding-left:3em; background-color:#ddd;">
      <p><input id="input16" autocomplete="off" value="test">
      <br><select id="select16" autocomplete="off">
          <option value="one">one
          <option value="two">two
          <option value="three">three
      </select>
      <br>
      <textarea id="textarea16" rows=3 cols=30 autocomplete="off">your content here !...</textarea>
    </div>

    <script type="text/python" id="script16">
    from browser import document, html

    def show_values(event):
        input = document["input16"].value
        select = document["select16"]
        option = select.options[select.selectedIndex].value
        text = document["textarea16"].value
        document["zone16"].clear()
        document["zone16"] <= (f"Value in INPUT field: {input}",
            html.BR(), f"Selected option: {option}",
            html.BR(), f"Value in TEXTAREA field: {text}"
            )

    document["button16"].bind("click", show_values)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

</div>

<div class="example" id="ex13">
    <button id="button13">select elements by CSS selectors</button>
    <span id="zone13" class="zone"></span>

    <script type="text/python" id="script13">
    from browser import document, html

    def change(event):
        # clear the zone
        document["zone13"].clear()

        # get a list of all BUTTON elements
        buttons = document.select("button")
        document["zone13"] <= "On this page there are {} buttons ".format(len(buttons))

        # get a list of all tags with class "zone"
        zones = document.select(".zone")
        document["zone13"] <= "and {} elements with class 'zone'".format(len(zones))

    document["button13"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    We have seen how to get an element by its id : <code>document[element_id]</code>. Here, <code>document["zone13"]</code> is the bordered box at the right of the button.
    <p>The method <code>select(css_selector)</code> provides a way to select elements based on the <a href="http://www.w3schools.com/cssref/css_selectors.asp" target="_blank">CSS selector syntax</a>. Passing the name of a tag returns a list of all the elements with this tag ; passing <code>.zone</code> returns a list of all the elements whose attribute <code>class</code> is set to <code>"zone"</code>.
    </span>
</div>

<div class="example" id="ex14">
    <button id="button14">rotate an element</button>
    <span id="zone14" class="zone">
        <button style="background-color: red; width: 1.5em;" id="rot14">&nbsp;</button>
    </span>

    <script type="text/python" id="script14">
    from browser import document, html

    moving = document["rot14"]
    angle = 10

    def change(event):
        global angle
        moving.style.transform = f"rotate({angle}deg)"
        angle += 10

    document["button14"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    <code>transform</code> is another attribute of <code>style</code> that can make changes to the element, including a rotation by a specified angle.
    </span>
</div>

<div class="example" id="ex15">
    <button id="button15">animate an element</button>
    <p>
    <div id="zone15" style="padding:0;" class="zone">
        <button style="background-color: #fff; border-width: 0px; color:#000;padding:0;font-size:24px;height:auto;" id="rot15">&#9658;</button>
    </div>

    <script type="text/python" id="script15">
    from browser import document, window

    moving = document["rot15"]
    x = 0
    dx = 3
    run = None

    def change(event):
        global run
        if run is None:
            # start animation
            animloop(1)
        else:
            # stop animation
            window.cancelAnimationFrame(run)
            run = None

    document["button15"].bind("click", change)

    def render():
        global x, dx
        moving.style.transform = "translate({}px,0)".format(x)
        x += dx
        if x > document["zone15"].offsetWidth-moving.offsetWidth:
            dx = -dx
            moving.html = "&#9668;" # left triangle
        elif x <= 0:
            dx = -dx
            moving.html = "&#9658;" # right triangle

    def animloop(t):
        global run
        run = window.requestAnimationFrame(animloop)
        render()
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    The browser window provides 2 functions to start and stop an animation : <code>requestAnimationFrame</code> and <code>cancelAnimationFrame</code>.
    <p>When the user clicks on the button, the animation is started by calling the function <code>animloop</code> with an arbitrary argument. <code>window.requestAnimationFrame</code>, called with the function itself as argument, returns a reference to the animation. The drawing function, <code>render()</code> is called ; the loop is then executed repeatedly under the control of the animation loop.
    <p>In <code>render()</code>, to put the element at a specific location, we use another <code>transform</code> function, <code>translate(x, y)</code>. The moving element bounces, and its shape changes, when its position reaches the box borders.
    <p>If the user clicks the button again, calling <code>window.cancelAnimationFrame</code> on the animation object stops the animation.
    </span>
</div>

<div class="example" id="ex_mousemove">
    <button id="button_mousemove" style="border-width:0;background-color:inherit;">
        move an element with the mouse
    </button>
    <b id="moving" style="top:10px; left: 140px;">drag me
    </b>

    <script type="text/python"  id="script_mousemove">
    from browser import document

    class ElementMove:

        def __init__(self, moving):
            """Make "moving" element movable with the mouse"""
            self.moving = moving
            self.is_moving = False
            self.moving.bind("mousedown", self.start)
            self.moving.bind("mouseup", self.stop)
            moving.style.cursor = "move"

        def start(self, event):
            """When user clicks on the moving element, set boolean is_moving
            to True and store mouse and moving element positions"""
            self.is_moving = True
            self.mouse_pos = [event.x, event.y]
            self.elt_pos = [self.moving.left, self.moving.top]
            document.bind("mousemove", self.move)
            # prevent default behaviour to avoid selecting the moving element
            event.preventDefault()

        def move(self, event):
            """User moves the mouse"""
            if not self.is_moving:
                return

            # set new moving element coordinates
            self.moving.left = self.elt_pos[0] + event.x - self.mouse_pos[0]
            self.moving.top = self.elt_pos[1] + event.y - self.mouse_pos[1]

        def stop(self, event):
            """When user releases the mouse button, stop moving the element"""
            self.is_moving = False
            document.unbind("mousemove")

    ElementMove(document["moving"])
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    This example uses other mouse events than "click" : "mousedown", "mousemove" and "mouseup".
    <p>The mouse position is available by the attributes <code>x</code>, <code>y</code> of the event object.
    <p>The position of an element can be changed by defining its attributes <code>left</code> and <code>top</code>.
    </span>
</div>

<div class="example" id="ex_ls">
    <button id="button_ls">use local storage</button>
    <p><div id="zone_ls" style="padding-left:1em;"></div>

    <script type="text/python"  id="script_ls">
    from browser import document, window
    from browser.html import TABLE, TR, TD, INPUT, BUTTON

    zone = document["zone_ls"]

    """Test if the browser supports local storage"""
    try:
        storage = window.localStorage
        storage.setItem("x", "x")
        storage.removeItem("x")
    except:
        storage = None

    def action(ev):
        """User clicked on "add" or "remove" button"""
        button = ev.target
        row = button.closest("TR")
        if button.text == "remove":
            key = row.get(selector="TD")[0].text
            storage.removeItem(key)
        else:
            key, value = [x.value for x in row.get(selector="INPUT")]
            if key.strip():
                storage.setItem(key, value)
        # refresh table
        show()

    def update_value(ev):
        """If a value field has been modified, update storage"""
        row = ev.target.closest("TR")
        key = row.get(selector="TD")[0].text
        value = row.get(selector="INPUT")[0].value
        storage.setItem(key, value)

    def show(*args):
        """Shows the data stored locally, add buttons to add / remove items"""
        zone.clear()

        if storage is None:
            zone <= "No local storage for this browser"
            return

        table = TABLE()
        for i in range(storage.length):
            key = storage.key(i)
            value = storage.getItem(key)
            value_field = INPUT(value=value)
            value_field.bind("change", update_value)
            table <= TR(TD(key) + TD(value_field)+
                TD(BUTTON("remove", Class="btn-ls")))

        table <= TR(TD(INPUT()) + TD(INPUT()) +
            TD(BUTTON("add", Class="btn-ls")))

        zone <= table

        for button in document["zone_ls"].get(selector="button"):
            button.bind("click", action)

    document["button_ls"].bind("click", show)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    The <a href="https://developer.mozilla.org/en-US/docs/Web/API/Storage" target="_blank">Storage</a> API allows local storage of key/value pairs.
    <p>Notice the use of method <code>elt.closest(tagName)</code> to get the first DOM element with the specified tag name above <code>elt</code>.
    <p>The event "change" on the INPUT field is triggered when the field loses focus, if the value has been modified.
    </span>

</div>

<div class="example" id="ex10">
    <button id="button10">send an Ajax request</button>
    <p><div id="zone10" class="zone" style="padding-left:1em;"></div>

    <script type="text/python"  id="script10">
    from browser import document, ajax

    url = "http://api.open-notify.org/iss-now.json"
    msg = "Position of the International Space Station at {}: {}"

    def complete(request):
        import json
        import datetime
        data = json.loads(request.responseText)
        position = data["iss_position"]
        ts = data["timestamp"]
        now = datetime.datetime.fromtimestamp(ts)
        document["zone10"].text = msg.format(now, position)

    def click(event):
        req = ajax.ajax()
        req.open("GET", url, True)
        req.bind("complete", complete)
        document["zone10"].text = "waiting..."
        req.send()

    document["button10"].bind("click", click)
    </script>

    <p>
    <i>Warning: this demo only works if this page (demo.html) is served in
    http, not https.</i>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    The module <code class="module">browser.ajax</code> allows sending Ajax calls, ie sending HTTP requests to a URL and handle the reply without having to reload the page.
    <p>Here we use a public API that gives the current position of the International Space Station. The callback function <code>complete()</code> is called when the Ajax call has completed ; its argument has an attribute <code>responseText</code>, the response sent by the server. In this case, the API tells us that it's a JSON string. We decode it with the module <code class="module">json</code> of the standard distribution.
    </span>

</div>

<div class="example" id="ex50">
    <button id="button50">select, read and save a local file</button>

    <script type="text/python" id="script50">
    from browser import bind, window, document

    load_btn = document["rtfile1"]
    save_btn = document["save_file"]

    @bind(load_btn, "input")
    def file_read(ev):

        def onload(event):
            """Triggered when file is read. The FileReader instance is
            event.target.
            The file content, as text, is the FileReader instance's "result"
            attribute."""
            document['rt1'].value = event.target.result
            # display "save" button
            save_btn.style.display = "inline"
            # set attribute "download" to file name
            save_btn.attrs["download"] = file.name

        # Get the selected file as a DOM File object
        file = load_btn.files[0]
        # Create a new DOM FileReader instance
        reader = window.FileReader.new()
        # Read the file content as text
        reader.readAsText(file)
        reader.bind("load", onload)

    @bind(save_btn, "mousedown")
    def mousedown(evt):
          """Create a "data URI" to set the downloaded file content
          Cf. https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/Data_URIs
          """
          content = window.encodeURIComponent(document['rt1'].value)
          # set attribute "href" of save link
          save_btn.attrs["href"] = "data:text/plain," + content


  </script>

    <br><input type="file" id="rtfile1">
    <a id="save_file" href="#" download class="anchor-as-button">save</a>
    <br><textarea id="rt1" rows="20" cols="60" autocomplete="off"></textarea>
    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    This example is a minimalist text editor : it shows how to select a local
    file in the user's machine, display its content in a TEXTAREA, and save the
    TEXTAREA content to disk.
    <p>It uses the interface
    <a href="https://developer.mozilla.org/en-US/docs/Web/API/File" target="_blank" class="external">File</a> of the DOM API.
    </span>
</div>
<div class="example" id="ex5">
    <button id="button5">write in the browser console</button>

    <script type="text/python" id="script5">
    from browser import document

    document["button5"].bind("click", lambda ev: print("Hello !"))
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    By default, <code>print()</code> writes message in the browser console window (to open it, right-click on the page, and click the "Inspect Element" button.
    Safari users cannot see this option initially.).
    <p>Like in Python, the output can be reset by setting <code>sys.stdout</code> to an object with a method <code>write()</code>.
    </span>
</div>

<pre style="display:none" id="catalog">
<CATALOG>
  <CD>
    <ALBUM>Love Bites</ALBUM>
    <ARTIST>Buzzcocks</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <YEAR>1978</YEAR>
  </CD>
  <CD>
    <ALBUM>Turn On The Bright Lights</ALBUM>
    <ARTIST>Interpol</ARTIST>
    <COUNTRY>USA</COUNTRY>
    <YEAR>2002</YEAR>
  </CD>
  <CD>
    <ALBUM>Visions Of A Life</ALBUM>
    <ARTIST>Wolf ALice</ARTIST>
    <COUNTRY>UK</COUNTRY>
    <YEAR>2017</YEAR>
  </CD>
</CATALOG>
</pre>

<div class="example" id="ex18">
    <button id="button18">parse an XML document</button>

    <p><div id="zone18" class="zone" style="padding-left:1em;width:auto;"></div>

    <script type="text/python" id="script18">
    from browser import document, window, html
    parser = window.DOMParser.new()

    def show(node, container):
        if hasattr(node, "tagName"):
            container <= html.STRONG(node.tagName)
            ul = html.UL()
            container <= ul
            for child in node.childNodes:
                show(child, ul)
        elif node.text.strip():
            container <= html.LI(node.text)

    def show_xml(ev):
        # XML source is in a hidden element "catalog" in this page
        src = document["catalog"].html
        tree = parser.parseFromString(src, "application/xml")

        root = tree.firstChild

        show(root, document["zone18"])

    document["button18"].bind("click", show_xml)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    Instead of using the XML modules in Python standard library, it's more efficient
    to use the Web API <a href="">DOMParser</a> to parse XML documents.
    </span>
</div>


<div class="example" id="ex11">
    <button id="button11">use javascript objects : Date</button>
    <span id="zone11" class="zone"></span>

    <script type="text/python" id="script11">
    from browser import document
    import javascript

    def show_date(event):
        date = javascript.Date.new()
        document["zone11"].text = "{}-{:02}-{:02} at {:02}:{:02}:{:02}".format(
            date.getFullYear(), date.getMonth()+1, date.getDate(),
            date.getHours(), date.getMinutes(), date.getSeconds())

    document["button11"].bind("click", show_date)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    Brython provides the modules <code class="module">time</code> and
    <code class="module">datetime</code> of the standard distribution, but it
    can also interact with the objects defined by Javascript.
    <p>To use such objects, import the module <code class="module">javascript</code>:
    it is used to get a reference objects defined by the Javascript language.
    <p>Because the Javascript object <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date" target="_blank"><code>Date</code></a>
    is a constructor (ie a function that returns new objects with the syntax
    <i>var date = new Date()</i>), we create Brython objects with the
    attribute <code>new</code>.
    <p>We then use the attributes of the Javascript instance of
    <code>Date()</code> such as <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/getFullYear" target="_blank"><code>getFullYear</code></a>
    with the usual Python syntax.
    </span>
</div>

<div class="example" id="ex17">
    <button id="button17">use javascript objects : RegExp, String</button>
    <span id="zone17" class="zone"></span>

    <script type="text/python" id="script17">
    from browser import document
    import javascript

    def change(event):
        s = javascript.String.new("abracadabra")
        document["zone17"].text = s.replace(javascript.RegExp.new("a", "g"), "i")

    document["button17"].bind("click", change)
    </script>

    <p>
    <pre class="python"></pre>
    <p>

    <span class="comment">
    Similarly, Brython provides the standard Python module
    <code class="module">re</code> for regular expressions, but it can also
    use the Javascript <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions" target="_blank">RegExp</a>
    and <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String" target="_blank">String</a> classes.
    </span>
</div>


<script type="text/python">
from browser import document, html, highlight

# create first menu entry

def home(ev):
    global current
    if current is not None:
        document[current].style.display = "none"
        document <= document[current]
        document["a"+current].style.fontWeight = "normal"
    example_id = "home"
    ev.target.style.fontWeight = "bold"
    document["panel"].clear()
    document["panel"] <= document[example_id]
    document[example_id].style.display="block"
    current = example_id

anchor = html.A("Home", Class="menu", href="#", id="ahome")
anchor.bind("click", home)

document["menu"] <= html.LI(anchor)
current = "home"

def load_example(ev):
    global current
    # remove dialogs
    for dialog in document.select(".brython-dialog-main"):
        dialog.remove()
    if current is not None:
        document[current].style.display = "none"
        document <= document[current]
        document["a"+current].classList.remove("selected")
    example_id = ev.target.num
    example = document[example_id]
    ev.target.classList.add("selected")
    document["panel"].clear()
    document["panel"] <= example
    example.style.display="block"
    script = example.get(selector="script")[0]
    src = script.text
    while src.startswith("\n"):
        src = src[1:]
    indent = 0
    while src[indent] == ' ':
        indent += 1
    src = "\n".join(line[indent:] for line in src.split("\n"))
    src = highlight.highlight(src)
    code_elt = example.get(selector="pre")
    if code_elt:
        code_elt[0].html = src.html
    else:
        example <= src
    current = example_id

for example in document.get(selector=".example"):
    # add the Python source inside the example

    # create a menu entry
    button = example.get(selector="button")[0]
    anchor = html.A(button.text, Class="menu", href="#", id="a"+example.id)
    anchor.num = example.id

    anchor.bind("click", load_example)
    document["menu"] <= html.LI(anchor)

    # hide the element
    example.style.display = "none"

</script>
<script src="brython.js"></script>
<script src="brython_stdlib.js"></script>

</body>

</html>