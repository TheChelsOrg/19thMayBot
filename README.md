# Nineteenth of May Bot

![Tweet](https://github.com/TheChelsOrg/bot_nineteenth_of_may/workflows/Tweet/badge.svg) ![Pylint](https://github.com/TheChelsOrg/bot_nineteenth_of_may/workflows/Pylint/badge.svg)

> A twitter bot that live tweets the Champions League final of May 19th 2012 on its anniversary.

## Notes

The commentary-log.csv contains:

- The time offset (the bot sleeps for x minutes after tweet before the next one to try and replicate game time).
- Text (the body of the tweet).

The Twitter API allows for 2400 calls per rolling 24 hour period. so the CSV file should have no more than 2000 rows to be safe, the first commit had 100.

The text in the file should not be more than 140 characters (otherwise twitter won't publish it).

## Contributing

Feel free to contribute ( add more details, correct typos, and general improvements).
Fork it, change it, pull it.

read CONTRIBUTING.md for more info.

## History

The original commentary-log.csv was taken from the 31st December 2012 / 1st January 2013 when @ChelseaStats started the new year with a 'live' tweeting of the best night in 2012.
