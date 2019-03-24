pipeline {
    agent {
        docker {
            image 'codeception/codeception:2.5.2'
            args '''
                --volume="$PWD:/app"
                --workdir=/app
                --entrypoint=''
                -t
            '''
        }
    }
    stages {
        stage('Test') {
            steps {
                sh 'codecept run codequests --no-colors'
            }
        }
    }
}