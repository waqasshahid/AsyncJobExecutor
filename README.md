# AsyncJobExecutor

AsyncJobExecutor is a custom Laravel system for running PHP classes as background jobs, separate from Laravel's built-in queue.

## Features
- Background job execution
- Cross-platform compatibility (Windows, Unix)
- Error handling, logging, and retries
- Job dashboard for monitoring

## Setup
1. Clone the repository.
2. Install dependencies:
    ```bash
    composer install
    ```
3. Configure `.env` for logging.

## Usage
### Launch a Job
```php
launchAsyncJob(\App\Jobs\SomeJob::class, 'someMethod', ['param1', 'param2']);
