pipeline {
    agent {
        docker {
            image 'php:7.3-cli'
            args '''
                --volume="$PWD:/app"
                --workdir=/app
            '''
        }
    }
    stages {
        stage('Build') {
            steps {
                sh 'php composer install'
            }
        }
        stage('Test') {
            steps {
                sh './vendor/bin/composer run codequests'
            }
        }
    }
}