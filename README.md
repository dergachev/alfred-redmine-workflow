Alfred Redmine Workflow (Evolving Web)
======================================

Installation
------------

* Get Alfred (3 or 4) with Powerpack (paid version)
* If using Cloudflare Access instead of VPN, ensure to create & run a pre-authenticated reverse proxy to redmine on localhost:9090 [Gist with instructions](https://gist.github.com/dergachev/62633abc9874a10cc28618276eb94519)
** runs a reverse proxy on http://localhost:9090 with your tokens being injected (it needs to be running all the time)
```
brew install cloudflare/cloudflare/cloudflared
brew install mitmproxy

export REDMINE_URL=https://your-redmine-url.com
export REDMINE_API_TOKEN=paste-your-redmine-api-token-here # manually visit $REDMINE_URL/my/account and click "Show API access key", then copy it
cloudflared access login $REDMINE_URL

mitmdump -p 9090 --mode reverse:$REDMINE_URL \
  --setheader :~q:cf-access-token:$(cloudflared access token -app=$REDMINE_URL) \
  --setheader :~q:X-Redmine-API-Key:$REDMINE_API_TOKEN

```
* Install Redmine-Workflow.alfredworkflow from [GitHub Release page](https://github.com/dergachev/alfred-redmine-workflow/releases)

Usage
-----

* `rmti <user>` - show timesheet this month for **user**
* `rmtp <project>` - show timesheet this month for **project**
* `rmsi <query>` - search for issue matching **query**
* `rmsp <query>` - search for project matching **query**
* `rms <query>` - search for any records matching **query**



