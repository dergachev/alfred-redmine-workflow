Alfred Redmine Workflow (Evolving Web)
======================================

Installation
------------
* If using Cloudflare Access instead of VPN, ensure to create & run a pre-authenticated reverse proxy to redmine on localhost:9090 [Gist with instructions](https://gist.github.com/dergachev/62633abc9874a10cc28618276eb94519)
** Note: for now I don't support `api_key` in this workflow directly, so everyone must use this proxy, even without Cloudflare Access
* Install this workflow into Alfred

Usage
-----

* `rmti <user>` - show timesheet this month for **user**
* `rmtp <project>` - show timesheet this month for **project**
* `rmsi <query>` - search for issue matching **query**
* `rmsp <query>` - search for project matching **query**
* `rms <query>` - search for any records matching **query**



