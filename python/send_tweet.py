import csv
import time

def get_offset(i):
    return (int(i) * 60)

with open('commentary-log.csv') as csvfile:
 reader = csv.DictReader(csvfile)
 for row in reader:
    time.sleep(get_offset(row['offset']))
    print(row['text'])
