wildtime-api
============

API for the Wild Time app

Currently works with two models: 
- Timeframe – a period of time, eg. 20 minutes, into which Activities are categroised.
- Activity – a Wild Time activity that fits into a Timeframe.

### Timeframes

Get a list of all available Timeframes:
    /timeframes.json

Get a specific Timeframe by ID:
    /timeframes/view/:timeframe_id.json

To return activities with each timeframe, add with=Activities as a query string parameter:
    /timeframes?with=Activities
    /timeframes/view/:timeframe_id.json?with=Activities

### Activities

Get a list of all Activities:
    /activities.json

Get a list of Activities for a specific Timeframe:
    /timeframes/:timeframe_id/activities.json

Get a specific activity by ID:
    /activities/view/:activity_id.json
