
Don't forget to run `composer install`

```
curl "http://localhost:9090/search.json?scope=&limit=3&q=redmine" | python -m json.tool

{
    "limit": 3,
    "offset": 0,
    "results": [
        {
            "datetime": "2020-06-12T19:39:22Z",
            "description": "I constantly do a search in redmine for a specific issue:\r\n!{width:50%}screenshot_1_1591990578_Screen_Shot_2020-06-12_at_3.36.14_PM.png!\r\n\r\nOr a specific project:\r\n!{width:50%}screenshot_2_1591990711_Screen_Shot_2020-06-12_at_3.38.24_PM.png!\r\n\r\nIt would be useful if I could get the JSON results directly in Alfred and click on the right one.\r\n\r\nI messed around with these plugins, but they don't seem to do anything useful:\r\n* https://github.com/jason0x43/alfred-redmine\r\n* https://github.com/lisposter/alfred-redmine\r\n\r\nInstead, I found this \"easy\" looking  tutorial:\r\nhttps://www.deanishe.net/alfred-workflow/tutorial_1.html\r\n\r\nTo mess with a couple existing plugins while working around Cloudflare Access, I figured out a MITMPROXY workflow here: https://gist.github.com/dergachev/62633abc9874a10cc28618276eb94519",
            "id": 21533,
            "title": "Todo #21533 (Open): Investigate Redmine+Alfred integration",
            "type": "issue",
            "url": "https://rm.ewdev.ca/issues/21533"
        },


curl https://rm.ewdev.ca/users.json?limit=100 | python -m json.tool

{
    "limit": 100,
    "offset": 0,
    "total_count": 50,
    "users": [
        {
            "admin": false,
            "created_on": "2020-06-05T14:49:14Z",
            "firstname": "Adrian",
            "id": 208,
            "last_login_on": "2020-06-10T21:10:12Z",
            "lastname": "Ebsary",
            "login": "adrian.ebsary",
            "mail": "adrian.esbary@evolvingweb.ca"
        },

curl https://rm.ewdev.ca/projects.json?limit=100

{
    "projects": [
        {
            "created_on": "2020-02-21T17:02:03Z",
            "custom_fields": [
                {
                    "id": 8,
                    "name": "Project Client Code",
                    "value": null
                },
                {
                    "id": 9,
                    "name": "Project Type",
                    "value": null
                }
            ],
            "description": "",
            "id": 306,
            "identifier": "altasciences",
            "inherit_members": false,
            "is_public": false,
            "name": "Altasciences",
            "status": 1,
            "updated_on": "2020-02-21T17:02:03Z"
        }
    ]
}




```

