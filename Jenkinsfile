pipeline {
    agent {
        docker {
            image 'codeception/codeception:2.5.2'
            args '''
                --volume="$PWD:/app"
                --workdir=/app
                --entrypoint=''
            '''
        }
    }
    stages {
        stage('Test code-quests.rdok.dev') {
            steps {
                sh 'codecept run codequests_rdok_dev --no-colors'
            }
        }
        stage('Test rdok.dev') {
            steps {
                sh 'codecept run rdok_dev --no-colors'
            }
        }
        stage('Test jenkins.rdok.dev') {
            steps {
                sh 'codecept run jenkins_rdok_dev --no-colors'
            }
        }
    }
}