let _activity, _type, _changeActivityBtn;

// Help functions
function GetElById(id)
{
    return document.getElementById(id);
}

function Init()
{
    _activity = GetElById("Activity");
    _type = GetElById("Type");
    _changeActivityBtn = GetElById("ChangeActivityBtn");
    _changeActivityBtn.addEventListener("click", ChangeActivity);
    FetchActivity();
}

function FetchActivity()
{
    fetch("https://www.boredapi.com/api/activity")
    .then(result => result.json())
    .then((data) => 
    {
        _activity.innerText = data.activity;
        _type.innerText = data.type;
    });
}

function ChangeActivity()
{
    FetchActivity();
}

Init();