var row;
var col;
var populationCount = 0;
var generationCount = 0;
var cellID;
var mainArray = new Array(col);
var current;
var running = false;
cycle = 1;

function makeGrid()
{
	
	document.getElementById("grid").style.visibility = "visible";
    document.getElementById("buttons").style.visibility = "visible";
	document.getElementById("output").style.visibility = "visible";
	document.getElementById("sizeinput").style.visibility = "hidden";
	var grid = document.getElementById("grid");
	var row = document.getElementById("rows").value;
	var col = document.getElementById("columns").value;
		for (var i = 0; i < row; i++)
		{
		    var tr = grid.insertRow();
			mainArray[i] = new Array(col);
			for (var j = 0; j < col; j++)
			{
				var td = tr.insertCell();
				td.id = i + "," + j;
				cellID = td.id;
				td.setAttribute("onclick", "onClick(" + i + "," + j + ")");
				mainArray[i][j] = 0;
			}  
		}
	while (cycle === 1){
	    Inc();
	    generationCount = 0;
	    //generationCount--;
	    document.getElementById("output").innerHTML = "Generation: " + generationCount + "<br>Population: " + populationCount;
	    cycle = 2;
	}	
}

function onClick(x, y)
{
    cellID = x + "," + y;
    el = document.getElementById(cellID);

    current = mainArray[x][y];

    if (current === 0)
    {
        mainArray[x][y] = 1;
        populationCount++;
    } else
    {
        mainArray[x][y] = 0;
        populationCount--;
    }
    if (current === 0)
    {
        el.style.backgroundColor = "black";
    } else
    {
        el.style.backgroundColor = "white";
    }
    document.getElementById("output").innerHTML = "Generation: " + generationCount + "<br>Population: " + populationCount;
}

function Random()
{
    populationCount = 0;
    generationCount = 0;
    for (var i = 0; i < (document.getElementById("rows").value); i++)
    {
        for (var j = 0; j < (document.getElementById("columns").value); j++)
        {
            var randInt = Math.floor(Math.random() * (2));
            mainArray[i][j] = randInt;
            cellID = i + "," + j;
            el = document.getElementById(cellID);
            if (mainArray[i][j] === 1)
            {
                populationCount++;
            }
            if (mainArray[i][j] === 0)
            {
                el.style.backgroundColor = "white";
            }
            else
            {
                el.style.backgroundColor = "black";
            }
        }
    }
    document.getElementById("output").innerHTML = "Generation: " + generationCount + "<br>Population: " + populationCount;
}

function Reset()
{
    for (var i = 0; i < (document.getElementById("rows").value); i++)
    {
        for (var j = 0; j < (document.getElementById("columns").value); j++)
        {
            mainArray[i][j] = 0;
            cellID = i + "," + j;
            el = document.getElementById(cellID);
            el.style.backgroundColor = "white";
        }
    }
    populationCount = 0;
    generationCount = 0;
    document.getElementById("output").innerHTML = "Generation: " + generationCount + "<br>Population: " + populationCount;
    while(running === true){
    Stop();
    }
    running = false;   
    document.getElementById("startButton").style.visibility = "visible";
}

function Start()
{
    
	time = setInterval("Inc()", 210);
	document.getElementById("startButton").style.visibility = "hidden";
	running = true;    
}

function Stop()
{
    while(running === true) 
    { 
	window.clearInterval(time);
	document.getElementById("startButton").style.visibility = "visible";
	running = false;
    }  
     
}

function Inc()
{
    var liveN = 0;
    var tempArray = new Array();
    var lastColumn = col - 1;
    var bottomRow = row - 1;
    var current;
    while(cycle > 1){
    generationCount++;
    document.getElementById("output").innerHTML = "Generation: " + generationCount + "<br>Population: " + populationCount;
	}
	generationCount++;	
    row = document.getElementById("rows").value;
    col = document.getElementById("columns").value;
    for (var x = 0; x < row; x++)
    {   
        tempArray[x] = new Array(col); //creates 2D array
        for (var y = 0; y < col; y++)
        {    
            current = mainArray[x][y];
            cellID = x + "," + y;
            el = document.getElementById(cellID);
            if (el.style.backgroundColor === "white")
            {
                current = 0;
            }
            else
            {
                current = 1;
            }

            if (x === 0 || y === 0 || x === bottomRow || y === lastColumn){
                if (x === 0 && y === 0){  //first cell (top left corner) 
                    liveN = mainArray[x + 1][y] + mainArray[x][y + 1] + mainArray[x + 1][y + 1];
                }
                else if (y > 0 && y < lastColumn && x === 0) //First row, middle cells
                {
                    liveN = mainArray[x][y - 1] + mainArray[x][y + 1] + mainArray[x + 1][y] + mainArray[x + 1][y - 1] + mainArray[x + 1][y + 1];
                }
                else if (x === 0 && y === lastColumn) //top right corner cell
                {
                    liveN = mainArray[x][y - 1] + mainArray[x + 1][y] + mainArray[x + 1][y - 1];
                }
                else if (x > 0 && x < bottomRow && y === 0) //First column, middle cells
                {
                    liveN = mainArray[x + 1][y] + mainArray[x][y + 1] + mainArray[x - 1][y] + mainArray[x - 1][y + 1] + mainArray[x + 1][y + 1];
                }
                else if (x === bottomRow && y === 0) //bottom left corner cell
                {
                    liveN = mainArray[x][y + 1] + mainArray[x - 1][y] + mainArray[x - 1][y + 1];
                }
                else if (x === bottomRow && y > 0 && y < lastColumn) //Bottom row, middle cells
                {
                    liveN = mainArray[x - 1][y] + mainArray[x][y - 1] + mainArray[x][y + 1] + mainArray[x - 1][y - 1] + mainArray[x - 1][y + 1];
                }
                else if (x === bottomRow && y === lastColumn) //bottom right corner cell
                {
                    liveN = mainArray[x - 1][y] + mainArray[x][y - 1] + mainArray[x - 1][y - 1];
                }
                else if (x > 0 && x < bottomRow && y === lastColumn) //Last column, middle cells
                {
                    liveN = mainArray[x - 1][y] + mainArray[x + 1][y] + mainArray[x][y - 1] + mainArray[x - 1][y - 1] + mainArray[x + 1][y - 1];
                }
            }
            else
            {
                liveN = mainArray[x - 1][y] + mainArray[x + 1][y] + mainArray[x][y - 1] + mainArray[x][y + 1] + mainArray[x - 1][y - 1] + mainArray[x - 1][y + 1] + mainArray[x + 1][y - 1] + mainArray[x + 1][y + 1];//ALL interior cells
            }
            if (current === 1) //if current lives
            {
	            if (liveN > 3 || liveN < 2)
	            {
	                tempArray[x][y] = 0; //dies
	            }
	            else
	            {
	                tempArray[x][y] = 1; //lives
	            }
        	} 
        	else //if current dead
        	{
        		if (liveN === 3)
	            {
	                tempArray[x][y] = 1; //lives
	            }
	            else 
	            {
	                tempArray[x][y] = 0; //dies
	            }
        	}
            liveN = 0;
        }     
    }

    populationCount = 0;
    for (var i = 0; i < row; i++){            
        for (var j = 0; j < col; j++){
            mainArray[i][j] = tempArray[i][j];
            cellID = i + "," + j;
            el = document.getElementById(cellID);
                if(mainArray[i][j] === 1){
                    el.style.backgroundColor = "black";
                    populationCount++;
                }
                else {
                    el.style.backgroundColor = "white";    
                }
        }
    }
    //while (cycle > 1){
    document.getElementById("output").innerHTML = "Generation: " + generationCount + "<br>Population: " + populationCount;
	//}
}

function Inc23()
{
	for (var x = 1;x < 24;x++)
	{
		Inc();
	}	
}

function Reload()
{
    location.reload();
}